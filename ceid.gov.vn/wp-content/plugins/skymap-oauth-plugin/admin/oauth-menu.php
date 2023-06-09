<?php

class OauthMenu
{

  private $OauthSettingPage;

  public function __construct($OauthSettingPage)
  {
    $this->OauthSettingPage = $OauthSettingPage;
  }

  public function init()
  {
    add_action('admin_menu', array($this, 'add_menu_page'));
  }

  public function add_menu_page()
  {
    add_menu_page(
      'Cài đặt CEID Oauth',
      'Cài đặt CEID Oauth',
      'administrator',
      'smop-admin-page',
      array($this->OauthSettingPage, 'render')
    );
  }
}
