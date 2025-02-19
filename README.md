# Simple JWT Login MailPoet - Login users from newsletter

<p align="center">
    <a href="https://wordpress.org/support/plugin/simple-jwt-login-mailpoet/reviews/"><img src="https://img.shields.io/wordpress/plugin/stars/simple-jwt-login-mailpoet" alt="Rating" /></a>
    <a href="https://wordpress.org/plugins/simple-jwt-login-mailpoet/advanced#plugin-download-stats"><img src="https://img.shields.io/wordpress/plugin/dt/simple-jwt-login-mailpoet" alt="Total Downloads" /></a>
    <a href="https://wordpress.org/plugins/simple-jwt-login-mailpoet/#description"><img src="https://img.shields.io/wordpress/plugin/installs/simple-jwt-login-mailpoet" alt="Active installs" /></a>
</p>

<p align="center">
    <img src="https://img.shields.io/wordpress/plugin/v/simple-jwt-login-mailpoet" alt="Simple-Jwt-Login-Mailpoet WordPress.org version"/>
    <img src="https://img.shields.io/wordpress/plugin/required-php/simple-jwt-login-mailpoet" alt="Required PHP version"/>
    <img src="https://img.shields.io/wordpress/plugin/tested/simple-jwt-login-mailpoet" alt="Latest Tested WordPress version"/>
</p>

<p align="center">
    <a href="https://docs.github.com/en/pull-requests/collaborating-with-pull-requests/proposing-changes-to-your-work-with-pull-requests/creating-a-pull-request"><img src="https://img.shields.io/badge/PRs-welcome-brightgreen" alt="PRs welcome" /></a>
    <a href="https://github.com/nicumicle/simple-jwt-login/tags"><img src="https://img.shields.io/github/v/tag/simple-jwt-login/mailpoet-integration" alt="Current Tag" /></a>
    <a href="https://github.com/simple-jwt-login/mailpoet-integration/commits/master"><img src="https://img.shields.io/github/last-commit/simple-jwt-login/mailpoet-integration" alt="Last Commit"/></a>
    <a href="https://github.com/simple-jwt-login/mailpoet-integration/issues"><img src="https://img.shields.io/github/issues-raw/simple-jwt-login/mailpoet-integration" alt="Open issues"/></a>
    <a href="https://github.com/simple-jwt-login/mailpoet-integration/issues?q=is%3Aissue+is%3Aclosed"><img src="https://img.shields.io/github/issues-closed-raw/simple-jwt-login/mailpoet-integration" alt="Closed issues"/></a>
    <a href="https://github.com/simple-jwt-login/mailpoet-integration/pulls"><img src="https://img.shields.io/github/issues-pr/simple-jwt-login/mailpoet-integration" alt="Open pull requests" /></a>
    <a href="https://github.com/simple-jwt-login/mailpoet-integration/pulls?q=is%3Apr+is%3Aclosed"><img src="https://img.shields.io/github/issues-pr-closed/simple-jwt-login/mailpoet-integration" alt="Closed pull requests" /></a>
</p>

The Simple JWT Login MailPoet plugin is an add-on for the [Simple-Jwt-Login](https://github.com/nicumicle/simple-jwt-login) plugin. 
It allows you to seamlessly log users into your WordPress site using a JWT generated from MailPoet newsletters.


## Dependencies

- [MailPoet](https://wordpress.org/plugins/mailpoet/) plugin ( Version 3 )
- [Simple-JWT-Login](https://wordpress.org/plugins/simple-jwt-login/) plugin

## How It Works

This add-on works by embedding a simple shortcode within your MailPoet email templates. The shortcode generates a login link that automatically authenticates users in WordPress via JWT when clicked.

## Basic Shortcode Example:

```
    [custom:simple-jwt-login]
```

This shortcode will generate a link, with the text "Login".


Available shortcode parameters:
- `text` : Text displayed on the login link (e.g., "Click to Login").
- `class`: Add a custom CSS class to the link.
- `style`: Add custom inline CSS to the link.
- `validity`: Duration (in seconds) for which the JWT is valid (e.g., `3600` for 1 hour).
- `authCode`: The Auth Code required for login. You can find this in Simple-JWT-Login -> Auth Codes.
- `redirectUrl`: This URL will overwrite the SimpleJWTLogin settings, and it will specify where users will be redirected after autologin. 
- `isUrl`: If this parameter is set, the shortcode will return the auto-login URL instead of rendering the login link.


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

1. Download the **Simple-JWT-login-MailPoet** plugin ZIP file.
2. Upload the ZIP file in your WordPress
3. Activate the plugin from the "Plugins" menu in WordPress.

or

1. Go to the 'Plugins' menu in WordPress and click **Add New**
2. Search for 'Simple-JWT-Login-MailPoet' and select **Install Now**
3. Activate the plugin when prompted


## Next steps:

- After installation, go to the **Simple JWT Login**  settings in your WordPress dashboard.
- In the **MailPoet Integration** tab, generate your shortcode.
- Copy the generated shortcode and paste it into your MailPoet email templates.


## Frequently Asked Questions

### Is the Auth Code required?
No, the Auth Code is optional. You can disable it in the **Simple-JWT-Login** -> **Login Settings** by setting **Login requires Auth Code** to **No**.

### Does this plugin works with MailPoet 2?
No, this plugin is compatible only with **MailPoet 3**, as MailPoet 2 is deprecated.

### Can I  add multiple short-codes in a single newsletter?
Yes, you can add as many shortcodes as you need within a single email template.


 
