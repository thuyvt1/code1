<?php
class SMOP_OAuth_Hanlder
{
  function getAccessToken($tokenendpoint, $grant_type, $clientid, $clientsecret, $code, $redirect_url)
  {
    $response = $this->getToken($tokenendpoint, $grant_type, $clientid, $clientsecret, $code, $redirect_url);
    $content = json_decode($response, true);

    if (isset($content["access_token"])) {
      return $content["access_token"];
      exit;
    } else {
      echo 'Invalid response received from OAuth Provider. Contact your administrator for more details.<br><br><b>Response : </b><br>' . $response;
      exit;
    }
  }

  function getToken($tokenendpoint, $grant_type, $clientid, $clientsecret, $code, $redirect_url)
  {

    $clientsecret = html_entity_decode($clientsecret);
    $body = array(
      'grant_type'    => $grant_type,
      'code'          => $code,
      'client_id'     => $clientid,
      'client_secret' => $clientsecret,
      'redirect_uri'  => $redirect_url,
    );
    $headers = array(
      'Accept'  => 'application/json',
      'charset'       => 'UTF - 8',
      'Content-Type' => 'application/x-www-form-urlencoded',
    );

    $response   = wp_remote_post($tokenendpoint, array(
      'method'      => 'POST',
      'timeout'     => 45,
      'redirection' => 5,
      'httpversion' => '1.0',
      'blocking'    => true,
      'headers'     => $headers,
      'body'        => $body,
      'cookies'     => array(),
      'sslverify'   => false
    ));
    if (is_wp_error($response)) {
      wp_die($response);
    }
    $response =  $response['body'];

    return $response;
  }

  function getResourceOwner($resourceownerdetailsurl, $access_token)
  {
    $headers = array();
    $headers['Authorization'] = 'Bearer ' . $access_token;

    $response   = wp_remote_post($resourceownerdetailsurl, array(
      'method'      => 'GET',
      'timeout'     => 45,
      'redirection' => 5,
      'httpversion' => '1.0',
      'blocking'    => true,
      'headers'     => $headers,
      'cookies'     => array(),
      'sslverify'   => false
    ));

    if (is_wp_error($response)) {
      wp_die($response);
    }

    $response =  $response['body'];
    $content = json_decode($response, true);
    return $content;
  }
  function hanlderUser($user)
  {
    $user_in_wp = get_user_by('login', $user['username']);
    // echo '<pre>', var_dump(wp_roles()), '</pre>';
    // exit();
    $role = isset($user['roles']) && isset($user['roles'][0]) ? $user['roles'][0]['code'] : "";
    $data = [
      'user_pass' => generateRandomString(30),
      'user_login' => $user['username'],
      'user_email' => $user['email'],
      'first_name' => $user['first_name'],
      'last_name' => $user['last_name'],
      'description' => $user['note'],
      'user_registered' => date('Y-m-d h:i:s', strtotime($user['created_at'])),
      'role' =>  $role
    ];
    if ($user_in_wp) {
      unset($data['user_pass']);
      $data['ID'] = $user_in_wp->ID;
      $user_return = wp_update_user($data);
    } else {
      $user_return = wp_insert_user($data);
    }
    if (is_wp_error($user_return)) {
      echo '<pre>', var_dump($user_return), '</pre>';
      exit("insert or update user error");
    }
    $user  = get_user_by('ID', $user_return);
    return $user;
  }
}
function generateRandomString($length = 10)
{
  return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}
