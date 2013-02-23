Habari_Mailchimp
================
A Habari plugin to add a newsletter signup form using the Mailchimp API

### Usage
Activate the plugin and configure with your API key and Unique List ID.

Currently, the plugin is only set up to display the form in a theme via ```php
<?php echo $theme->mailchimp_form(); ?>
```
Future versions will include a block as well a quicktag to embed in a page.

### MailChimp PHP API Wrapper 1.3
The plugin relies on the [Mailchimp PHP API](http://apidocs.mailchimp.com/api/downloads/#php) wrapper, which is included with the plugin.

### License
Habari Mailchimp is licensed under the [Apache Software License 2.0](http://www.apache.org/licenses/LICENSE-2.0.html). The Mailchimp PHP API Wrapper is licensed under the [MIT License](http://opensource.org/licenses/MIT)

### Changelog
0.1 initial release

