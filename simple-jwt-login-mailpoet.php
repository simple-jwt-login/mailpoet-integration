<?php
/*
    Plugin Name: Simple-JWT-Login-MailPoet
    Plugin URI: https://simplejwtlogin.com
    Description: Simple-JWT-Login MailPoet Add-on integrates MailPoet with Simple-Jwt-Login
    Author: Nicu Micle
    Author URI: https://github.com/nicumicle
    Text Domain: simple-jwt-login-mailpoet
    Domain Path: /i18n
    Version: 1.0.1
*/

add_action('admin_menu', 'simple_jwt_login__mailpoet_plugin_create_menu_entry', 11);
if (check_simple_jwt_login_activated() == false) {
    add_action('admin_notices', 'simple_jwt_login_plugin_missing_notice');
}

function simple_jwt_login_plugin_missing_notice()
{
    echo '<div class="error">'
        . __('Simple-JWT-Login-MailPoet plugin requires that the Simple JWT Login plugin is installed.', 'simple-jwt-login-mailpoet')
        . '</div>';
}

function simple_jwt_login__mailpoet_plugin_create_menu_entry()
{
    add_submenu_page(
        'main-page-simple-jwt-login-plugin',
        __('MailPoet Integration', 'simple-jwt-login-mailpoet'),
        __('MailPoet Integration', 'simple-jwt-login-mailpoet'),
        'manage_options',
        'simple_jwt_login_mailpoet',
        'simple_jwt_login_mailpoet_function'
    );
}

add_action('plugins_loaded', 'simple_jwt_login_mail_poet_load_translations');

function simple_jwt_login_mail_poet_load_translations()
{
    load_plugin_textdomain(
        'simple-jwt-login-mail-poet',
        false,
        plugin_basename(dirname(__FILE__)) . '/i18n/'
    );
}

function check_simple_jwt_login_activated()
{
    return in_array(
        'simple-jwt-login/simple-jwt-login.php',
        get_option('active_plugins')
    );
}

function simple_jwt_login_mailpoet_function()
{
    $isSimpleJwtLoaded = check_simple_jwt_login_activated();
    if (!$isSimpleJwtLoaded) {
        return;
    }

    $pluginData = get_plugin_data(__FILE__);
    $pluginVersion = isset($pluginData['Version'])
        ? $pluginData['Version']
        : false;
    $pluginDirUrl = plugin_dir_url(__FILE__);
    $simpleJwtLoginpluginDirUrl = plugin_dir_url('simple-jwt-login/simple-jwt-login.php');

    $loadScriptsInFooter = false;
    wp_enqueue_style(
        'simple-jwt-login-bootstrap',
        $simpleJwtLoginpluginDirUrl . 'vendor/bootstrap/bootstrap.min.css',
        [],
        $pluginVersion
    );
    wp_enqueue_style(
        'simple-jwt-login-mailpoet-style',
        $pluginDirUrl . 'assets/css/style.css',
        [],
        $pluginVersion
    );

    wp_enqueue_script(
        'simple-jwt-bootstrap-min',
        $simpleJwtLoginpluginDirUrl . 'vendor/bootstrap/bootstrap.min.js',
        ['jquery'],
        $pluginVersion,
        $loadScriptsInFooter
    );

    wp_enqueue_script(
        'simple-jwt-login-mailpoet-scripts',
        $pluginDirUrl . 'assets/js/scripts.js',
        ['simple-jwt-bootstrap-min'],
        $pluginVersion,
        $loadScriptsInFooter
    );

    include_once 'views/layout.php';
}

if (check_simple_jwt_login_activated()) {
    include_once 'mailpoet.php';
}
