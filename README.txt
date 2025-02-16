=== Simple JWT Login MailPoet - Login users from newsletter ===

Contributors: nicu_m
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=PK9BCD6AYF58Y&source=url
Tags: jwt, auto login, tokens, auth, generate jwt, mailpoet
Requires at least: 4.4.0
Tested up to: 6.7
Requires PHP: 5.5
Stable tag: 1.0.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

This plugin is an Add-on for Simple-Jwt-Login. It allows you to automatically login users from the newsletter sent by MailPoet into a WordPress website using a JWT.

Simple shortcode example:

``
    [custom:simple-jwt-login]
``

This shortcode will generate a link, with the text "Login"

Available shortcode parameters:
- text : The text for the link
- class: Class added for the link
- style: Custom CSS added to the link
- validity: The number of seconds a JWT is valid  
- authCode: Auth Code that is required by Autologin. You will find this in Simple-JWT-Login plugin -> Auth Codes 
- redirectUrl: This URL will overwrite the SimpleJWTLogin settings, and it will specify where users will be redirected after autologin. 
- isURL: When this parameter is provided, the shortcode will return only the autologin URL

Full short code example:

``
    [custom:simple-jwt-login text="Login" class="myClassName" style="color:red;" validity="604800" authCode="1"]
``

This example will generate a red link, with the text "Login".

You can also customize the shortcode to just return the URL.

``
    [custom:simple-jwt-login text="Login" validity="604800" isUrl="on"]
``

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

= 1.0.1 ( 31 Jul 2024)
- Fix Shortcode handler
- Update WordPress 6.6 compatibility

= 1.0.0 ( 03 May 2024)
- Test with latest WordPress version

= 0.1.1 ( 26 Apr 2022) =
- Add a new parameter to allow the display of only the URL

= 0.1.0 ( 06 Apr 2022) =
- Initial release


 
