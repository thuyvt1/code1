<?php

/**
 * Plugin Name: Skymap Oauth plugin
 * Plugin URI:
 * Description: Đây là plugin để chỉnh tích hợp CEID oauth vào wordpress.
 * Version: 1.0
 * Author: hung.pv
 * Author URI:
 * License: GPLv2 or later
 */

require('handler/oauth_handler.php');
foreach (glob(plugin_dir_path(__FILE__) . 'admin/*.php') as $file) {
  include_once $file;
}
class SMOP_Oauth
{
  function __construct()
  {
    add_action('login_form', array($this, 'smop_oauth_login_form'));
    add_action('admin_init',  array($this, 'smop_oauth_save_settings'));
    add_action('init', array($this, 'smop_oauth_login_validate'));
    add_action('wp_enqueue_scripts', array($this, 'smop_oauth_wplogin_form_style'));
    $option = get_option('smop_ceid_oauth_app');
    if (empty($option) || is_string($option)) {
      $option = [];
    }
    update_option('smop_ceid_oauth_app', array_merge([
      'key' => 'CEID',
      'logo_class' => 'fa fa-lock',
      'login_label' => 'Đăng nhập bằng Tài khoản VEA',
      'login_color' =>  '#00a65a',
    ], $option));
    register_deactivation_hook(__FILE__, array($this, 'smop_oauth_deactivate'));
    $plugin = new OauthMenu(new OauthSettingPage());
    $plugin->init();
  }

  public function smop_oauth_deactivate()
  {
    remove_action('login_form', array($this, 'smop_oauth_login_form'));
    remove_action('admin_init',  array($this, 'smop_oauth_save_settings'));
    remove_action('init', array($this, 'smop_oauth_login_validate'));
    delete_option('smop_ceid_oauth_app');
  }
  function smop_oauth_save_settings()
  {
    wp_enqueue_style('smop_oauth_style_settings', plugins_url('css/style-settings.css', __FILE__));

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (current_user_can('administrator')) {
        $option = get_option('smop_ceid_oauth_app');
        $new_data = [];
        $keys = ['login_color', 'login_label', 'logo_class', 'resourceownerdetailsurl', 'clientid', 'clientsecret', 'authorizeurl', 'redirecturi', 'accesstokenurl'];
        foreach ($keys as $key) {
          if (!empty($_POST[$key])) {
            $new_data[$key] = $_POST[$key];
          }
        }
        $new_data['is_show_login_btn'] = isset($_POST['is_show_login_btn']) ? (int)filter_var($_POST['is_show_login_btn'], FILTER_SANITIZE_NUMBER_INT) : 0;

        update_option('smop_ceid_oauth_app', array_merge($option, $new_data));
      }
    }
  }
  function smop_oauth_login_validate()
  {
    if (isset($_REQUEST['option']) and strpos($_REQUEST['option'], 'oauthredirect') !== false) {
      $appname = $_REQUEST['app_name'];
      $app = get_option('smop_ceid_oauth_app');
      if (isset($_REQUEST['redirect_url'])) {
        update_option('smop_oauth_redirect_url', $_REQUEST['redirect_url']);
      }
      if ($appname != $app['key']) {
        exit("not support");
      }
      if (empty($app['clientid'])  || empty($app['clientsecret'])) {
        exit('Cấu hình thiếu thông tin');
      }
      if (empty($app['authorizeurl']) || empty($app['redirecturi']) || empty($app['accesstokenurl']) || empty($app['resourceownerdetailsurl'])) {
        exit('Cấu hình thiếu thông tin đường dẫn');
      }
      $state = base64_encode($appname);
      $authorizationUrl = $app['authorizeurl'];

      if (strpos($authorizationUrl, '?') !== false) {
        $authorizationUrl = $authorizationUrl . "&client_id=" . $app['clientid'] . "&scope=" . $app['scope'] . "&redirect_uri=" . $app['redirecturi'] . "&response_type=code&state=" . $state;
      } else {
        $authorizationUrl = $authorizationUrl . "?client_id=" . $app['clientid'] . "&scope=" . $app['scope'] . "&redirect_uri=" . $app['redirecturi'] . "&response_type=code&state=" . $state;
      }
      if (isset($_REQUEST['test']))
        setcookie("mo_oauth_test", true);
      else
        setcookie("mo_oauth_test", false);
      if (session_id() == '' || !isset($_SESSION)) {
        session_start();
      }

      $_SESSION[$app['key'] . '_oauth_state'] = $state;
      header('Location: ' . $authorizationUrl);
      exit;
    } else if (strpos($_SERVER['REQUEST_URI'], "/oauthcallback") !== false || isset($_REQUEST['code'])) {
      if (session_id() == '' || !isset($_SESSION)) {
        session_start();
      }
      if (!isset($_REQUEST['code'])) {
        if (isset($_REQUEST['error_description'])) {
          exit($_REQUEST['error_description']);
        } else if (isset($_REQUEST['error'])) {
          exit($_REQUEST['error']);
        }
        exit('Không tìm thấy mã xác thực');
      }
      try {
        if (isset($_REQUEST['state']) && !empty($_REQUEST['state'])) {
          $currentappname = base64_decode($_REQUEST['state']);

          $app = get_option('smop_ceid_oauth_app');
          if ($app['key'] !== $currentappname) {
            exit("not support");
          }
          $oauth_handler = new SMOP_OAuth_Hanlder();
          $accessTokenUrl = $app['accesstokenurl'];
          $accessToken = $oauth_handler->getAccessToken($accessTokenUrl, 'authorization_code', $app['clientid'], $app['clientsecret'], $_GET['code'], $app['redirecturi']);

          if (!$accessToken) {
            exit('Không trả về mã truy cập.');
          }
          $resourceownerdetailsurl = $app['resourceownerdetailsurl'];
          $resourceOwner = $oauth_handler->getResourceOwner($resourceownerdetailsurl, $accessToken);
          //TEST Configuration
          if (isset($_COOKIE['mo_oauth_test']) && $_COOKIE['mo_oauth_test']) {
            echo '<div style="font-family:Calibri;padding:0 3%;">';
            echo '<style>table{border-collapse:collapse;}th {background-color: #eee; text-align: center; padding: 8px; border-width:1px; border-style:solid; border-color:#212121;}tr:nth-child(odd) {background-color: #f2f2f2;} td{padding:8px;border-width:1px; border-style:solid; border-color:#212121;}</style>';
            echo "<h2>Test Configuration</h2><table><tr><th>Attribute Name</th><th>Attribute Value</th></tr>";
            smop_oauth_client_testattrmappingconfig("", $resourceOwner);
            echo "</table>";
            echo '<div style="padding: 10px;"></div><input style="padding:1%;width:100px;background: #0091CD none repeat scroll 0% 0%;cursor: pointer;font-size:15px;border-width: 1px;border-style: solid;border-radius: 3px;white-space: nowrap;box-sizing: border-box;border-color: #0073AA;box-shadow: 0px 1px 0px rgba(120, 200, 230, 0.6) inset;color: #FFF;"type="button" value="Done" onClick="self.close();">&emsp;</div>';
            exit();
          }
          $user = $oauth_handler->hanlderUser($resourceOwner['data']);
          if ($user) {

            wp_set_current_user($user->ID);
            wp_set_auth_cookie($user->ID);
            do_action('wp_login', $user->user_login, $user);
            $redirect_to = get_option('smop_oauth_redirect_url');

            if ($redirect_to == false) {
              $redirect_to = home_url();
            }
            wp_redirect($redirect_to);
            exit;
          }
        }
      } catch (Exception $e) {
        exit($e->getMessage());
      }
    }
  }

  function smop_oauth_wplogin_form_style()
  {
    wp_enqueue_style('smop-oauth-fontawesome-css', plugins_url('css/font-awesome.css', __FILE__));
    wp_enqueue_style('smop-oauth-wploginform-css', plugins_url('css/login-page.css', __FILE__));
  }


  public function smop_oauth_login_form()
  {
    $currentapp = get_option('smop_ceid_oauth_app');
    if (isset($currentapp['is_show_login_btn']) && $currentapp['is_show_login_btn'] === 1) {
      $this->smop_oauth_load_login_script();
      $this->smop_oauth_wplogin_form_style();
      $logo_class = $currentapp['logo_class'];
      echo '<div class="row">';
      echo '<a style="text-decoration:none" href="javascript:void(0)" onClick="moOAuthLoginNew(\'' . $currentapp['key'] . '\');"><div class="smop_oauth_login_button"  style="background-color:' . $currentapp['login_color'] . '"><i class="' . $logo_class . ' smop_oauth_login_button_icon" ></i><div class="smop_oauth_login_button_text">' . $currentapp['login_label'] . '</div></div></a>';
      echo '</div><br>';
    }
  }
  private function smop_oauth_load_login_script()
  {
?>
    <script type="text/javascript">
      function moOAuthLoginNew(app_name) {
        window.location.href = '<?php echo site_url() ?>' + '/?option=oauthredirect&app_name=' + app_name;
      }
    </script>
<?php
  }
}

function smop_oauth_client_testattrmappingconfig($nestedprefix, $resourceOwnerDetails, $tr_class_prefix = '')
{
  $tr = '<tr class="' . $tr_class_prefix . 'tr">';
  $td = '<td class="' . $tr_class_prefix . 'td">';
  foreach ($resourceOwnerDetails as $key => $resource) {
    if (is_array($resource) || is_object($resource)) {
      if (!empty($nestedprefix))
        $nestedprefix .= ".";
      smop_oauth_client_testattrmappingconfig($nestedprefix . $key, $resource, $tr_class_prefix);
      $nestedprefix = rtrim($nestedprefix, ".");
    } else {
      echo $tr . $td;
      if (!empty($nestedprefix))
        echo $nestedprefix . ".";
      echo $key . "</td>" . $td . $resource . "</td></tr>";
    }
  }
}
new SMOP_Oauth;
