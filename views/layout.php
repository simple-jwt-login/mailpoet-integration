<?php

use SimpleJWTLogin\Modules\SimpleJWTLoginSettings;
use SimpleJWTLogin\Modules\WordPressData;

if (!defined('ABSPATH')) {
    exit;
} //end if


$simpleJwtLoginSettings = new SimpleJWTLoginSettings(new WordPressData());
$autologinRequiresAuthCodes = $simpleJwtLoginSettings->getLoginSettings()->isAuthKeyRequiredOnLogin();
$isPluginEnabled = $simpleJwtLoginSettings->getLoginSettings()->isAutologinEnabled();


if (!$isPluginEnabled) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="error">
                <?php
                echo __(
                    'Autologin is not enabled on Simple-Jwt-Login. Please enable it in order for the shortcode to work properly.',
                    'simple-jwt-login-mailpoet'
                );
                ?>
            </div>
        </div>
    </div>
    <?php
}
?>
<div id="simple-jwt-login-mailpoet">
    <div class="row">
        <div class="col-md-12">
            <h1><?php echo __('MailPoet Integration', 'simple-jwt-login-mailpoet'); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 align-left">
            <div class="container">
                <h2><?php echo __('Settings', 'simple-jwt-login-mailpoet'); ?></h2>
                <div class="item">
                    <label for="text-auth-code"><?php echo __('Auth Code', 'simple-jwt-login-mailpoet'); ?></label>
                    <p>
                        <?php
                        echo __(
                            'Auth Code for autologin. It is mandatory, only if the "Auto-Login Requires Auth Code" option is enabled.',
                            'simple-jwt-login-mailpoet'
                        );
                        ?>
                    </p>
                    <input type="text" id="text-auth-code" class="input form-control" value="">
                    <?php
                    if ($autologinRequiresAuthCodes || true) {
                        ?>
                        <div class="alert-warning">
                            <?php
                            echo __(
                                'Autologin requires AuthCodes. Please add one Auth Code.',
                                'simple-jwt-login-mailpoet'
                            );
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="item">
                    <label for="text-auth-code"><?php echo __('JWT Validity', 'simple-jwt-login-mailpoet'); ?></label>
                    <p>
                        <?php
                        echo __(
                            'Number of seconds the JWT if valid for. Default 1 Week.',
                            'simple-jwt-login-mailpoet'
                        );
                        ?>
                    </p>
                    <input type="text" id="text-jwt-validity" class="input form-control" value="604800">

                </div>
                <div class="item">
                    <label for="text-redirectUrl"><?php echo __('RedirectUrl', 'simple-jwt-login-mailpoet'); ?></label>
                    <p>
                        <?php
                        echo __(
                            'If this is provided, and it is enabled in Simple-JWT-Login, users will be redirected to this URL after successfully authenticated.',
                            'simple-jwt-login-mailpoet'
                        );
                        ?>
                    </p>
                    <input type="text" id="text-redirectUrl" class="input form-control" value="">

                </div>
                <h2><?php echo __('Design', 'simple-jwt-login-mailpoet'); ?></h2>
                <div class="item">
                    <label for="text-value"><?php echo __('Text', 'simple-jwt-login-mailpoet'); ?>:</label>
                    <p>
                        <?php
                        echo __(
                            'Button text',
                            'simple-jwt-login-mailpoet'
                        );
                        ?>
                    </p>
                    <input type="text" id="text-value" class="input form-control" value="Login">
                </div>
                <div class="item">
                    <label for="class-value"><?php echo __('Class', 'simple-jwt-login-mailpoet'); ?>:</label>
                    <p>
                        <?php
                        echo __(
                            'Button class name',
                            'simple-jwt-login-mailpoet'
                        );
                        ?>
                    </p>
                    <input type="text" id="class-value" class="input form-control" value="">
                </div>
                <div class="item">
                    <label for="class-style"><?php echo __('Style', 'simple-jwt-login-mailpoet'); ?>:</label>
                    <p>
                        <?php
                        echo __(
                            'Button custom CSS',
                            'simple-jwt-login-mailpoet'
                        );
                        ?>
                    </p>
                    <textarea id="class-style" class="input form-control" value=""></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="container">
                <div class="preview-container shortcode">
                    <h3><?php echo __('MailPoet Shortcode', 'simple-jwt-login-mailpoet'); ?></h3>
                    <div class="shortcode-container">
                          <span class="copy-button">
                                <button class="btn btn-secondary btn-xs">
                                    <?php echo __('Copy', 'simple-jwt-login-mailpoet'); ?>
                                </button>
                          </span>
                    </div>
                    <div id="simple-jwt-login-mailpoet-short-code"></div>
                </div>

                <div class="preview-container">
                    <h3><?php echo __('Shortcode Preview', 'simple-jwt-login-mailpoet'); ?></h3>
                    <div class="preview-button-container">
                        <div id="simple-jwt-login-mailport-preview"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
