<?php

class OauthSettingPage
{
  public function render()
  {
    $currentapp = get_option('smop_ceid_oauth_app');
    if (empty($currentapp['redirecturi'])) {
      $currentapp['redirecturi'] = site_url();
    }
?>
    <h1><?php esc_html_e('Cấu hình CEID Oauth.'); ?></h1>

    <div id="smop_oauth_add_app">
      <form id="form-common" name="form-common" method="post" action="admin.php?page=smop-admin-page">
        <?php wp_nonce_field('smop_oauth_add_app_form', 'smop_oauth_add_app_form_field'); ?>
        <input type="hidden" name="option" value="mo_oauth_add_app" />
        <table class="smop_settings_table">
          <tr>
            <td><strong>Đường dẫn gọi lại: </strong>
            </td>
            <td><input class="smop_table_textbox" id="callbackurl" type="text" readonly="true" name="redirecturi" value='<?php echo $currentapp['redirecturi']; ?>'>
            </td>
          </tr>
          <tr>
            <td><strong>
                <font color="#FF0000">*</font>Client ID:
              </strong></td>
            <td>
              <input class="smop_table_textbox" required="" type="text" name="clientid" value="<?php echo $currentapp['clientid']; ?>">
            </td>
          </tr>
          <tr>
            <td>
              <strong>
                <font color="#FF0000">*</font>Client Secret:
              </strong>
            </td>
            <td>
              <input class="smop_table_textbox" required="" type="password" name="clientsecret" value="<?php echo $currentapp['clientsecret']; ?>">
            </td>
          </tr>
          <tr>
            <td><strong>
                <font color="#FF0000">*</font>Đường dẫn xác thực:
              </strong></td>
            <td><input class="smop_table_textbox" require type="text" name="authorizeurl" value="<?php echo $currentapp['authorizeurl']; ?>"></td>
          </tr>
          <tr>
            <td><strong>
                <font color="#FF0000">*</font>Đường dẫn lấy mã truy cập:
              </strong></td>
            <td><input class="smop_table_textbox" require type="text" name="accesstokenurl" value="<?php echo $currentapp['accesstokenurl']; ?>"></td>
          </tr>
          <tr>
            <td><strong>
                <font color="#FF0000">*</font>Đường dẫn lấy thông tin người dùng:
              </strong></td>
            <td><input class="smop_table_textbox" require type="text" id="resourceownerdetailsurl" name="resourceownerdetailsurl" value="<?php echo $currentapp['resourceownerdetailsurl']; ?>"></td>
          </tr>
          <tr>
            <td>
              <strong>
                Nút đăng nhập
              </strong></td>
          </tr>
          <tr>
            <td>
              <strong>
                <font color="#FF0000">*</font>Nhãn:
              </strong></td>
            <td>
              <input class="smop_table_textbox" required="" type="text" name="login_label" value="<?php echo $currentapp['login_label']; ?>">
            </td>
          </tr>
          <tr>
            <td>
              <strong>
                <font color="#FF0000">*</font>Màu:
              </strong></td>
            <td>
              <input class="smop_table_textbox" required="" type="text" name="login_color" value="<?php echo $currentapp['login_color']; ?>">
            </td>
          </tr>
          <tr>
            <td><strong>Hiển thị</strong></td>
            <td>
              <div style="padding:5px;"></div><input type="checkbox" name="is_show_login_btn" value="1" <?php if (isset($currentapp['is_show_login_btn'])) {
                                                                                                          if ($currentapp['is_show_login_btn'] === 1) echo 'checked';
                                                                                                        }; ?> />
            </td>
          </tr>
        </table>
        <table class="smop_settings_table">
          <tr>
            <td><input id="mo_save_app" type="submit" name="submit_save_app" value="Lưu" class="button button-primary button-large" /></td>
          </tr>
        </table>
      </form>

      <div id="instructions">

      </div>
    </div>
<?php
  }
}
