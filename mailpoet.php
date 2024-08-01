<?php

use SimpleJWTLogin\Helpers\Jwt\JwtKeyFactory;
use SimpleJWTLogin\Libraries\JWT\JWT;
use SimpleJWTLogin\Modules\SimpleJWTLoginSettings;
use SimpleJWTLogin\Modules\WordPressData;

add_filter('mailpoet_newsletter_shortcode', 'simple_jwt_login_mailpoet_shortcode', 1, 6);
//mailpoet_newsletter_shortcode

function simple_jwt_login_mailpoet_shortcode(
    $shortcode,
    $newsletter,
    $subscriber,
    $queue,
    $newsletter_body,
    $arguments
)
{
    $re = '/^\[custom:simple[-]?jwt[-]?login(.*)\]$/m';
    preg_match_all($re, $shortcode, $matches, PREG_SET_ORDER, 0);

    // always return the shortcode if it doesn't match your own!
    if (empty($matches)) {
        return $shortcode;
    }

    $userId = $subscriber->getWpUserId();
    if (!$userId) {
        return $shortcode;
    }

    $validFor = 60 * 60 * 24 * 7; //60sec * 60min * 24 hours * 7 days
    if (isset($arguments['validity']) && (int)$arguments['validity'] > 0) {
        $validFor = (int)$arguments['validity'];
    }
    $date = time() + $validFor;

    $wordPressData = new WordPressData();
    $jwtSettings = new SimpleJWTLoginSettings($wordPressData);

    if ($jwtSettings->getLoginSettings()->isAutologinEnabled() === false) {
        return $shortcode;
    }

    $factory = JwtKeyFactory::getFactory($jwtSettings);
    try {
        $jwt = JWT::encode(
            [
                'id' => $userId,
                'email' => $subscriber->getEmail(),
                'exp' => $date,
            ],
            $factory->getPrivateKey(),
            $jwtSettings->getGeneralSettings()->getJWTDecryptAlgorithm()
        );

        $url = $wordPressData->getSiteUrl() . '?rest_route=/'
            . $jwtSettings->getGeneralSettings()->getRouteNamespace() . 'autologin&JWT=' . $jwt;

        $isAuthCodeRequired = $jwtSettings->getLoginSettings()->isAuthKeyRequiredOnLogin();

        if ($isAuthCodeRequired && isset($arguments['authcode'])) {
            $url .= '&' . $jwtSettings->getAuthCodesSettings()->getAuthCodeKey() . '=' . $arguments['authcode'];
        }
        if (isset($arguments['redirectUrl']) && $arguments['redirectUrl'] !== '') {
            $url .= '&redirectUrl=' . urlencode($arguments['redirectUrl']);
        }

        $loginText = isset($arguments['text']) ? $arguments['text'] : 'Login';
        $style = isset($arguments['style']) ? $arguments['style'] : null;
        $class = isset($arguments['class']) ? $arguments['class'] : null;

        if (isset($arguments['isUrl'])) {
            return $url;
        }

        return '<a href="' . $url . '"'
            . ($style ? ' style="' . $style . '"' : '')
            . ($class ? ' class="' . $class . '"' : '')
            . '>' . $loginText . '</a>';

    } catch (Exception $e) {
    }

    return $shortcode;

}