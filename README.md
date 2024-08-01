# Simple JWT Login MailPoet - Login users from newsletter
<p align="center">
  <a href="https://wordpress.org/support/plugin/simple-jwt-login-mailpoet/reviews/"><img src="https://img.shields.io/wordpress/plugin/stars/simple-jwt-login-mailpoet" alt="Rating" /></a>
  <a href="https://wordpress.org/plugins/simple-jwt-login-mailpoet/advanced#plugin-download-stats"><img src="https://img.shields.io/wordpress/plugin/dt/simple-jwt-login-mailpoet" alt="Total Downloads" /></a>
  <a href="https://wordpress.org/plugins/simple-jwt-login-mailpoet/#description"><img src="https://img.shields.io/wordpress/plugin/installs/simple-jwt-login-mailpoet" alt="Active installs" /></a>
  <a href="https://docs.github.com/en/pull-requests/collaborating-with-pull-requests/proposing-changes-to-your-work-with-pull-requests/creating-a-pull-request"><img src="https://img.shields.io/badge/PRs-welcome-brightgreen" alt="PRs welcome" /></a>
</p>

This is a WordPress plugin, and it is an Add-on for the Simple-Jwt-Login plugin.

It allows you to automatically login users from the newsletter sent by MailPoet into a WordPress website using a JWT.

## Requirements

- [MailPoet](https://wordpress.org/plugins/mailpoet/) WordPress plugin
- [Simple-JWT-Login](https://wordpress.org/plugins/simple-jwt-login/) WordPress plugin

## Usage

In order to use this addon, you need to add a shortcode in your MailPoet email templates:

Simple shortcode example:

```
    [custom:simple-jwt-login]
```

This shortcode will generate a link, with the text "Login"


Available shortcode parameters:
- `text` : The text for the link
- `class`: Class added for the link
- `style`: Custom CSS added to the link
- `validity`: The number of seconds a JWT is valid  
- `authCode`: Auth Code that is required by Autologin. You will find this in Simple-JWT-Login plugin -> Auth Codes 
- `redirectUrl`: This URL will overwrite the SimpleJWTLogin settings, and it will specify where users will be redirected after autologin. 
- `isURL`: When this parameter is provided, the shortcode will return only the autologin URL


Full short code example:

```
[custom:simple-jwt-login text="Login" class="myClassName" style="color:red;" validity="604800" authCode="1"]
```

This example will generate a red link, with the text "Login".

You can also customize the shortcode to just return the URL.

```
[custom:simple-jwt-login text="Login" validity="604800" isUrl="on"]
```


## Installation

Here's how you install and activate the  Simple-JWT-Login MailPoet plugin:

1. Download the Simple-JWT-login-MailPoet plugin.
2. Upload the .zip file in your WordPress plugin directory.
3. Activate the plugin from the "Plugins" menu in WordPress.

or

1. Go to the 'Plugins' menu in WordPress and click 'Add New'
2. Search for 'Simple-JWT-Login-MailPoet' and select 'Install Now'
3. Activate the plugin when prompted


Next steps:


In The "Simple JWT Login" tab, there will be a new submenu item "MailPoet integration". 
Generate your shortcode there and copy it into your newsletter templates.


## Frequently Asked Questions

### Is the Auth Code required?
No, it is not required. You can disable it from the Simple-JWT-Login -> 'Login'. Just set the parameter 'Login requires Auth Code' to 'No'.

### Does this plugin works with MailPoet 2?
No. This plugin works only with MailPoet 3. MailPoet 2 is deprecated.

### Can I  add multiple short-codes in a single newsletter?
Yes. You can add as many short-codes as you want in a single email template.


 
