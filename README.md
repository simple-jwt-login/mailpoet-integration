=== Simple JWT Login MailPoet- Login users from newsletter ===

Contributors: nicu_m
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=PK9BCD6AYF58Y&source=url
Tags: jwt, API, auto login, tokens, REST, auth, generate jwt, mailpoet
Requires at least: 4.4.0
Tested up to: 5.9
Requires PHP: 5.3
Stable tag: 0.1.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

This plugin is an Add-on for Simple-Jwt-Login. It allows you to automatically login users from the newsletter sent by MailPoet into a WordPress website using a JWT.

Simple shortcode example: 
```
    [custom:simple-jwt-login]
```
This shortcode will generate a link, with the text "Login"

Available shortcode parameters:
- text : The text for the link
- class: Class added for the link
- style: Custom CSS added to the link
- validity: The Variability of the JWT.  
- authCode: Auth Code that is required by Autologin. You will find this in Simple-JWT-Login plugin -> Auth Codes 
- redirectUrl: This URL will overwrite the SimpleJWTLogin settings, and it will specify where users will be redirected after autologin. 

Full short code example:
```
[custom:simple-jwt-login text="Login" class="myClassName" style="color:red;" validity="604800" authCode="1"]
```

This example will generate a red link, with the text "Login".

== Screenshots ==

1. Short code generator
2. Email template shortcode example
3. Email template preview

== Installation ==

Here's how you install and activate the JWT-login plugin:

1. Download the Simple-JWT-login-MailPoet plugin.
2. Upload the .zip file in your WordPress plugin directory.
3. Activate the plugin from the "Plugins" menu in WordPress.

or

1. Go to the 'Plugins' menu in WordPress and click 'Add New'
2. Search for 'Simple-JWT-Login-MailPoet' and select 'Install Now'
3. Activate the plugin when prompted

Next steps:
In The "Simple JWT Login" tab, there will be a new submenu item "MailPoet integration". Generate your shortcode there and copy it into your newsletter templates.

== Frequently Asked Questions ==

= Is the Auth Code required? =
No, it is not required. You can disable it from the Simple-JWT-Login -> 'Login'. Just set the parameter 'Login requires Auth Code' to 'No'.

= Does this plugin works with MailPoet 2?
No. This plugin works only with MailPoet 3. MailPoet 2 is deprecated.

= Can I  add multiple short-codes in a single newsletter?
Yes. You can add as many short-codes as you want in a single email template.

== Changelog ==

= 0.1.0 ( 06 Apr 2022) =
- Initial release


 
