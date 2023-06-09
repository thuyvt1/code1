=== WP Hide & Security Enhancer ===
Contributors: nsp-code, tdgu
Donate link: https://www.nsp-code.com/
Tags: wordpress hide, hide, security, improve security, hacking, wp hide, custom login, wp-loging.php, wp-admin, admin hide, login change, 
Requires at least: 2.8
Tested up to: 5.2.2
Stable tag: 1.5.8.2
License: GPLv2 or later

Hide and increase Security for your WordPress site using smart techniques. No files are changed on your server. Change default admin and wp-login urls

== Description ==

The **easy way to completely hide your WordPress** core files, login page, theme and plugins paths from being show on front side. This is a huge improvement over Site Security, no one will know you actually run a WordPress. Provide a simple way to clean up html by removing all WordPress fingerprints.

**No file and directory change!**
No file and directory is being changed anywhere, everything is processed virtually! The plugin code use URL rewrite techniques and WordPress filters to apply all internal functionality and features. Everything is done automatically, there's no user intervention require at all.

**Real hide of WordPress core files and plugins**
The plugin not only allow to change default urls of you WordPress, but it hide/block defaults! Other similar plugins, just change the slugs, but the default are still accessible, obliviously revealing WordPress as CMS

Change the default WordPress login urls from wp-admin and wp-login.php to something totally arbitrary. No one will ever know where to try to guess a login and hack into your site. Totally invisible !!

[vimeo http://vimeo.com/185046480]

<br />Full plugin documentation available at <a target="_blank" href="http://www.wp-hide.com/documentation/">WordPress Hide and Security Enhancer Documentation</a>

When testing with WordPress theme and plugins detector services/sites, any setting change may not reflect right away on their reports, since they use cache. So you may want to check again later, or try a different inner url, homepage url usage is not mandatory.

Being the best content management system, widely used, WordPress is susceptible to a large range of hacking attacks including brute-force, SQL injections, XSS, XSRF etc. Despite the fact the WordPress core is a very secure code maintained by a team of professional enthusiast, the additional plugins and themes makes the vulnerable spot of every website. In many cases, those are created by pseudo-developers who do not follow the best coding practices or simply do not own the experience to create a secure plugin. 
Statistics reveal that every day new vulnerabilities are discovered, many affecting hundreds of thousands of WordPress websites. 
Over 99,9% of hacked WordPress websites are target of automated malware scripts, who search for certain WordPress fingerprints. This plugin hide or replace those traces, making the hacking boots attacks useless.

Works fine with custom WordPress directory structures e.g. custom plugins, themes, uplaods folder.

Once configured, you need to **clear server cache data and/or any cache plugins** (e.g. W3 Cache), for a new html data to be created. If use CDN this should be cache clear as well.

**Sample usage**
[vimeo https://vimeo.com/192011678]

**Main plugin functionality:**

* Custom Admin Url
* Block default admin Url
* Block any direct folder access to completely hide the structure
* Custom wp-login.php filename
* Block default wp-login.php
* Block default wp-signup.php
* Block XML-RPC API
* New XML-RPC path
* Adjustable theme url
* New child Theme url
* Change theme style file name
* Clean any headers for theme style file
* Custom wp-include 
* Block default wp-include paths
* Block defalt wp-content
* Custom plugins urls
* Individual plugin url change 
* Block default plugins paths
* New upload url
* Block default upload urls
* Remove wordpress version
* Meta Generator block
* Disble the emoji and required javascript code
* Remove pingback tag
* Remove wlwmanifest Meta
* Remove rsd_link Meta
* Remove wpemoji
* Minify Html, Css, JavaScript

and many more.

**No other plugins functionality is being blocked or interfered in any way, everything will function the same**

This plugin allow to change default Admin Url's from **wp-login.php** and **wp-admin** to something else. All original links return default theme 404 Not Found page, like nothing exists there. Beside the huge security advantage, this save lots of server processing time by reducing php code and MySQL usage since brute-force attacks trigger wrong urls.

**Important:** Compared to all other similar plugins which mainly use redirects, this plugin return a default theme 404 error page for all **block url** functionality, so is not revealing at all the link existence.

Since version 1.2 Change individual plugin urls which make them unrecognizable, for example change default WooCommerce plugin urls and dependencies from domain.com/wp-content/plugins/woocommerce/ to domain.com/ecommerce/cdn/ or anything customized.

= Plugin Sections =

**Rewrite > Theme**

* New Theme Path - Change default theme path
* New Style File Path - Change default style file name and path
* Remove description header from Style file - Replace any WordPress metadata informations (like theme name, version etc) from style file
* Child - New Theme Path - Change default child theme path
* Child - New Style File Path - Change child theme stylesheed file path and name
* Child - Remove description header from Style file - Replace any WordPress metadata informations (like theme name, version etc) from style file

**Rewrite > WP includes**

* New Includes Path - Change default wp-includes path / url
* Block wp-includes URL - Block default wp-includes url

**Rewrite > WP content**

* New Content Path - Change default wp-content path / url
* Block wp-content URL - Block default content url

**Rewrite > Plugins**

* New Plugins Path - Change default wp-content/plugins path / url
* Block plugins URL - Block default wp-content/plugins url
* New path / url for Every Active Plugin
* Custom path and name for any active plugins

**Rewrite > Uploads**

* New Uploads Path - Change default media files path / url
* Block uploads URL - Block default media files url

**Rewrite > Comments**

* New wp-comments-post.php Path
* Block wp-comments-post.php

**Rewrite > Author**

* New Author Path
* Block default path

**Rewrite > Search**

* New Search Path
* Block default path

**Rewrite > XML-RPC**

* New XML-RPC Path - Change default XML-RPC path / url
* Block default xmlrpc.php - Block default XML-RPC url
* Disable XML-RPC authentication - Filter whether XML-RPC methods requiring authentication
* Remove pingback - Remove pingback link tag from theme

**Rewrite > JSON REST**

* Disable JSON REST V1 service - Disable an API service for WordPress which is active by default.
* Disable JSON REST V2 service - Disable an API service for WordPress which is active by default.
* Block any JSON REST calls - Any call for JSON REST API service will be blocked.
* Disable output the REST API link tag into page header
* Disable JSON REST WP RSD endpoint from XML-RPC responses
* Disable Sends a Link header for the REST API

**Rewrite > Root Files**

* Block license.txt - Block access to license.txt root file
* Block readme.html - Block access to readme.html root file
* Block wp-activate.php - Block access to wp-activate.php file
* Block wp-cron.php -  Block access to wp-cron.php file
* Block wp-signup.php - Block default wp-signup.php file
* Block other wp-*.php files - Block other wp-*.php files within WordPress Root

**Rewrite > URL Slash**

* URL's add Slash - Add a slash to any links without. This disguise any existing for a file, folder or a wrong url, they all be all slashed.


**General / Html > Meta**

* Remove WordPress Generator Meta
* Remove Other Generator Meta
* Remove Shortlink Meta
* Remove DNS Prefetch
* Remove Resource Hints
* Remove wlwmanifest Meta
* Remove feed_links Meta
* Disable output the REST API link tag into page header
* Remove rsd_link Meta
* Remove adjacent_posts_rel Meta
* Remove profile link
* Remove canonical link

**General / Html > Admin Bar**

* Remove WordPress Admin Bar for specified urser roles

**General / Feed**

* Remove feed|rdf|rss|rss2|atom links

**General / Robots.txt**

* Disable admin url within Robots.txt

**General / Html > Emoji**

* Disable Emoji
* Disable TinyMC Emoji

**General / Html > Styles**

* Remove Version
* Remove ID from link tags

**General / Html > Scripts**

* Remove Version

**General / Html > Oembed**

* Remove Oembed

**General / Html > Headers**

* Remove Link Header
* Remove X-Powered-By Header
* Remove X-Pingback Header

**General / Html > HTML**

* Remove HTML Comments
* Minify Html, Css, JavaScript
* Remove general classes from body tag
* Remove ID from Menu items
* Remove class from Menu items
* Remove general classes from post
* Remove general classes from images

**Admin > wp-login.php**

* New wp-login.php - Map a new wp-login.php instead default
* Block default wp-login.php - Block default wp-login.php file from being accesible

**Admin > Admin URL**

* New Admin Url - Create a new admin url instead default /wp-admin. This also apply for admin-ajax.php calls
* Block default Admin Url - Block default admin url and files from being accesible

**CDN**

* CDN Url - Set-up CDN if apply, some providers replace site assets with custom urls.

<br />This free version works with Apache and IIS server types. 

<br />Something is wrong with this plugin on your site? Just use the forum or get in touch with us at <a target="_blank" href="http://www.wp-hide.com">Contact</a> and we'll check it out.

<br />A website example can be found at <a target="_blank" href="http://nsp-code.com/demo/wp-hide/">http://nsp-code.com/demo/wp-hide/</a> or our website <a target="_blank" href="http://www.wp-hide.com/">WP Hide and Security Enhancer</a>

<br />Plugin homepage at <a target="_blank" href="http://www.wp-hide.com/">WordPress Hide and Security Enhancer</a>

<br />
<br />This plugin is developed by <a target="_blank" href="http://www.nsp-code.com">Nsp-Code</a>

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/wp-hide-security-enhancer` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the WP Hide menu screen to configure the plugin.

== Frequently Asked Questions ==

Feel free to contact us at electronice_delphi@yahoo.com

= Does the plugin change anything on my server  =

Absolute none! No file and directory is being changed anywhere, everything is processed virtually! The plugin code use URL rewrite techniques and WordPress filters to apply all internal functionality and features.

= Can i still update WordPress, my plugins and themes?  =

Everything works as before, no functionality is being breaked. You can run updates at any time.

= What servers this plugin can work  =

This free code can with Apache and IIS server types. For all others check the PRO version at http://www.wp-hide.com

= Something is wrong, what can i do? How can i recover my site? =

* First, stay calm. There will be no harm, guaranteed :)
* Go to admin and change some of plugin options to see which one cause the problem. Then report it to forum or get in touch with us to fix it.
* If you can't login to admin, use the Recovery Link which has been sent to your e-mail. This will reset the login to default.
* If you can't find the recovery link or none mentioned  above worked, delete the plugin from your wp-content/plugins directory. Then remove any lines in your .htaccess file between 
 BEGIN WP Hide & Security Enhancer
..
 END WP Hide & Security Enhancer 

* At this point the site should run as before. If for some reason still not working, you missed something, please get in touch with us at electronice_delphi@yahoo.com and we'll fix it for you in no time!

= I have no PHP knowledge at all, is this plugin for me? =

There's no requirements on php knowledge. All plugin features and functionality are applied automatically, controlled through a descriptive admin interface.

= I can't find a functionality that i'am looking for =

Please get in touch with us and we'll do our best to include it for a next version.

== Screenshots ==

1. Admin Interface.
2. Sample front html code.

== Changelog ==

= 1.5.8.2 =
Ensure base slug (e.g. base_slug/slug ) is not being used for another option to prevent rewrite conflicts
Return correct home path when using own directory for WordPress and hosting account use the same slug in the path.
Relocated get_default_variables() function on a higher priority execution level, to get default system details. 
Switched Yes / No options selection, to outputs first No then Yes ( more logical )

= 1.5.8 =
* Add reserved option names to avoid conflicts e.g. wp
* Always clear any code plugin cache when plugin update
* Easy Digital Downloads compatibility
* Elementor plugin compatibility
* Fusion Builder plugin compatibility
* Divi theme compatibility updates
* WP Fastest Cache plugin compatibility updates
* Check if ob_gzhandler and zlib.output_compression before using 'ob_gzhandler' output buffering handler


= 1.5.7 =
* Autoptimize css/js cache and minify compatibility
* Wp Hummingbird and WP Hummingbird PRO assets cache compatibility

= 1.5.6.9 =
* New functionality: Remove Link Header 

= 1.5.6.8 =
* Fix: Call for invalid method WP_Error::has_errors()
* Fix: Attempt to clear Opcache if API not being restricted

= 1.5.6.7 =
* Allow internal cron jobs to run even if wp-cron.php is blocked.
* Check with wp_filesystem for any errors and output the messages, before attempt to write any content
* Trigger site cache clear on settings changed or code update
* Slight css updates
* Mark block option in red text for better visibility and user awareness

= 1.5.6.4 =
* Fix: Keep double quote at the start of the replacements when doing JSON matches to avoid replacing strings for other domains
* Fix: Run compatibility pachage for "ShortPixel Adaptive Images" only when plugin is active

= 1.5.6.3 =
* Fix: remove javascript comments produce worng replacements on specific format.

= 1.5.6.2 =
* Use curent site prefix when retreiving 'user_roles'

= 1.5.6 =
* Fix BBPress menus by calling directly the wp_user_roles option ratter get_roles()
* Replace comments within inline JavaScript code when Remove Comments active
* Possible login conflict notices when using WebArx, WPS Hide Login
* New action wp-hide/admin_notices when plugin admin notices
* Return updated url when calling admin_url instead replaced when buffer outputs to ensure compatibility with specific plugins

= 1.5.5.9 =
* Compatibility module for ShortPixel Adaptive Image plugin
* Add support for texarea fields within plugin options interface
* Fixed urls for minified files when using WP Rocket cache plugin

= 1.5.5.7 =
* Filter remove fix

= 1.5.5.6 =
* Fix log-in page when using Wp Rocket cache

= 1.5.5.5 =
* Fix admin dashboard replacements when using Wp Rocket cache

= 1.5.5.4 =
* Fix Wp Rocket cache when using Minify and Concatenation
* New functionality - Remove Admin Bar for specified roles
* Module block structure extend to support 'callback_arguments' to passThrough additional data to processing function
* Redirect the default non-pretty-url search url to customized one

= 1.5.5 =
* New component: Rewrite Author
* New component: Rewrite Search
* Show recovery link on top of page to ensure everyone can save the link to use if something goe wrong.
* Send recovery code to site admin e-mail
* Minor Code adjustments 
* Send new login url to site admin e-mail, to ensure user can recover access to dashboard if forget new slug
* Removed unused methods within WPH_module_rewrite_new_include_path component

= 1.5.4.2 =
* Fix: Undefined method for WooCommerce compatibility module

= 1.5.4.1 =
* Allow rewrite for images within admin, as being reversed to default when saving the post

= 1.5.4 =
* Compatibility re-structure, use a general module
* Compatibility fix for Shield Security wp-simple-firewall
* Removed the upload_dir filtering as produce some issues on specific environment, possible incompatibilities will be post-processed within General compatibility module
* Filter the post content on save_post action, to reverse any custom slugs like media urls, to preserve backward compatibility, in case plugin disable
* Ensure wp-simple-firewall run once when called from multiple components
* Update for Rewrite Slash component, use a rewrite conditional to ensure the code is not trigger for POST method

= 1.5.3.1 =
* Fix JSON encoded urls when using SSL

= 1.5.3 =
* Remove _relative_domain_url_replacements_ssl_sq and _relative_domain_url_replacements_ssl_dq replacements for buffer as being integrated to other variables
* Relocated upload_dir() to general functions.php to catch new content and uploads slugs.
* Use full domain url for new wp-admin slug, instead relative to avoid wrong replacements for 3rd urls
* Use full domain url for new wp-login.php,  instead relative to avoid wrong replacements for 3rd urls
* Typos fix for CDN texts
* Additional description for "Block any JSON REST calls" option to prevent Gutenberg block
* Updated rewrite for URL Slash to include a second conditional, to not trigger on POST calls

= 1.5.2.2 =
* Add trailingslashit to plugins slug to be used for replacements to avoid wrong (partial) slug changes

= 1.5.2.1 =
* Fixed upload rewrite by using default_variables['upload_url']
* WordPrss 5.0 compatibility check

= 1.5.2 =
* Updated po language file
* CDN support when using custom urls
* Moved the action replacement for wp_redirect_admin_locations at _init_admin_url()
* Trigger the action replacement for wp_redirect_admin_locations only if new admin slug exists
* Preserve absolute paths when doing relative replacements
* Populate upload_dir() data with new url if apply
* When doing reset, empty all options before fill in existing with default to ensure deprecated data is not being held anymore

= 1.5.1.2 =
* Do not redirect to new admin url unless rewrite_rules_applied()
* Generate no rewrite rules if there's no options / reset
* Removed any passed through variables when calling the do_action('wph/settings_changed') as the function can take no argument.
* Re-generate a new write_check_string on settings change to ensure if no .htacccess / web.config file is writable, it trigger correct error and flag the disable_filters variable.
* Use inline JS code confirmation for Reset Settings, in case the separate JavaScript file is not loaded caused by an rewrite issue.
* Reset confirmation message update to better inform the admin upon the procedure to follow.
* WPEngine environment check, as they do not support Apache rewrite out of the box
* Strip off protocol and any www prefix for site_url and home_url to ensure accurate comparing
* Fixed redirect url when saving the options and WordPress deployed in subfolder
* Fixed redirect url when reset all options and WordPress deployed in subfolder
* Improved compatibility for WordPress subfolder install
* Fixed some rewrite lines when WordPress installed in a path and subfolder
* Replaced the internal variable permalinks_not_applied to more intuitive custom_permalinks_applied
* Restart the buffering if flushed out, mainly used for footer when updating plugins and themes
* Add textdomain for multiple untranslated texts
* Updated PO language file
* Fixed textdomain for couple texts
* Add text to textdomain

= 1.4.9.1 =
* Updated MU Loader, if there's no plugin active avoid to receive any notice.
* Allow new wp-login.php
* PRO version available
* Check if there's a 'message' key for arguments set through wp_mail filter
* Updated po language file

= 1.4.8.2 =
* WPML compatibility when use different domains for each language
* Replaced google social as it produced some JavaScript errors.
* Do not apply the admin/login replacements if permalinks where not applied.
* Language Po file update
* Minify replaces 'Remove new line carriage'
* Minify Html, Css, JavaScript
* Options for Minify to compress different components
* Fixed conflict with Shield Security

= 1.4.7.6 =
* PHP 7.2 compatibility
* Replaced trilingslashit from the end of template url to improve compatibility with urls (e.g. JavaScript variables) which does not include an ending slash.

= 1.4.7.4 =
* WooCommerce downloadables fix when using custom slug for uploads
* Include support for admin_url() along with admin-ajax.php
* Fixed redirect link after user register.
* Use get_rewrite_base and get_rewrite_to_base for all modules to apply correct site path and any WordPress subdirectory install
* WordPress subdirectory install compatibility fix
* Improved router file processor for WordPress subdirectory installs

= 1.4.7 =
* Rewrite changes for many components
* Rewrite update for admin and login url
* Typos fix
* Compatibility for diferent environments, when WordPress deployed in a domain root, a subdirectory, or it's own folder https://codex.wordpress.org/Giving_WordPress_Its_Own_Directory

= 1.4.6.6 =
* Fixed rewrite ens slashes for wp-login.php and wp-admin components

= 1.4.6.5 =
* Fixed hardcoded wp-register.php within rewrite - root files component
* Updated components to rewrite_base / rewrite_to system
* Improved components: Rewrite - WP Includes, Rewrite - WP Content, Rewrite - Plugins, Rewrite - Uploads, Rewrite - Comments, Rewrite - Root Files, Admin - wp-login.php, Admin - Admin Url
* Typo fix environemnt to environment
* New Component - Remove Shortlink Meta
* New Component - Remove new line carriage
* Apply relative paths change on styles only if main theme / child theme rewrite slug is not empty
* Improved interface errors and warnings transient structure
* Use ABSPATH and Environemnt data to create file path for file processing, instead just ABSPATH, for better compatibility

= 1.4.5.6 =
* Prevent the wp-register.php redirect to new login page when using block
* Prepare plugin for Composer package
* URL Slash description update
* xml_rpc_path add php_extension_required validation
* File processor use ABSPATH instead DOCUMENT_ROOT environment variable to avoid different paths on certain systems
* Allow path structure to be used for New Theme Path and Child - New Theme Path

= 1.4.5.1 =
* Media Galery src images fix
* Use separate variables for holding replacements to avoid key overwrite

= 1.4.5 =
* Add replacements for urls which does not contain explicit protocol e.g. http: or https:
* Avada cache URLs replacements support
* Fix processing_order for specific root files
* Ignore wp-register.php when blocking other wp-* files
* Fixed wp-register.php block
* Check for replacements on url encoded links
* Show message notices on General/HTML -> Html for options which may interfere with themes.
* sanitize_file_path_name fix when slug include a file type extension
* Prevent redirect to new url when accessing links through www
* New component Feeds
* Windows - Global file process rewrite rules update

= 1.4.4.4 =
* If no server type identification possible, try to check for .htaccess file
* Improved .htaccess search mod, Use preg_grep for identify the begin and end of WordPress rules
* Output notice when no supported server was found
* Use separate block of rules for .htaccess file, outside of WordPress lines 
* Improved server htaccess support check
* Moved WPH_CACHE_PATH constant declaration from mu loader to wph class
* Use shutdown hock instead wp_loaded when plugin inline updated
* Use FS_CHMOD_FILE for $wp_filesystem->put_contents

= 1.4.4.2 =
* Fixed default wp-content block
* Updated compatibility with WP Fastest Cache
* Fixed wp-content replacement

= 1.4.4.1 =
* Replace the file-process file remove update

= 1.4.4 =
* New component : Robots.txt to control the outputed data
* Check if any environment variable has changed before Update static environment file
* Improved Default constants map
* File-processing check WordPress wp-load.php down the path, for custom install directory.
* Templates style clean
* Use cache for cleaned styles files
* Set HTTP_MOD_REWRITE environment variable through mod_rewrite
* Separate rewrite rules from Wordpress and use distinct block with specific marker
* Add relative .htaccess file manipulation to avoid accessing permissions when WordPress installed within a subfolder.
* Updated .po language file

= 1.4.3 =
* Tags update

= 1.4.2 =
* Replaced "Remove description header from Style file" and "Child - Remove description header from Style file" functionality

= 1.4.1 =
* Security improvments

= 1.4 =
* Fix: Allow only css files to be processed through the router to prevent other types from being displayed arbitrary.
* Mu-loader updated version
* Environment allowed path to limit css files processing
* Include _get_plugin_data_markup_translate ratter WordPress method
* Fix: replacement_exists returned wrong response since not using priority keys
* Fix: Add media replacement, use correct replacement_exists function call
* Router check for client HTTP_ACCEPT_ENCODING type to start ob_start using ob_gzhandler or not.
* Update urls dynamically within stylesheets files e.g. include '../theme-name'
* Use trailingslashit for theme / child new urls to make sure it match full url instead partial theme name (e.g. main-theme and main-theme-child)
* Block wp-register.php
* get_home_path rely on DIRECTORY_SEPARATOR for better compatibility
* Check if plugin slug actually exists within all plugins list on re_plugin_path component

= 1.3.9.2 =
* Fix: Use of undefined constant WPH_VERSION

= 1.3.9.1 =
* Fix: Child theme settings not showing up
* Use register_theme_directory if empty $wp_theme_directories
* Plugin Options validation improvements for unique slug

= 1.3.9 =
* General / Html > Meta -> new option Remove DNS Prefetch
* New component - Comments
* Fix: Updated admin urls on plugin / theme / core update page
* fix: WP Rocket url replacements for non cached pages
* Regex patterns updates for better performance and compatibility
* Fix: WP Rocket - support HTML Optimization, including Inline CSS and Inline JS

= 1.3.8.1 =
* Fix - Create mu-plugins folder if not exists

= 1.3.8 =
* WP Rocket plugin compatibility module
* Plugin loader component through mu-plugins for earlier processing and environment manage
* Fix: Plugins Update iframe styles src
* Fix: WordPress Core Update redirect url
* WP Fastest Cache plug in compatibility improvements

= 1.3.7 =
* Sanitize Admin Url for not using extension (e.g. .php) as it confuse the server upon the headers to sent
* Fix: replacements links when using custom directory for WordPress core files
* Fix: child theme path fix when changing style filename
* New Theme Path - help resource link fix
* Changed from DOMDocument to preg_replace for better compatibility with themes and plugins
* Improved execution speed

= 1.3.6.3 =
* Fixed PHP Notice: Undefined variable: dom

= 1.3.6.2 =
* W3 Total Cache - Page Cache compatibility fix
* Canonical tag replacement improvements
* Pingback tag replacement improvements
* Fix custom Background Images for body on themes which support that feature

= 1.3.6 =
* Post-process on options interface save for unique slugs on any text inputs to prevent conflicts.
* Processing Order change for new_theme_child_path to occur before new_theme_path
* New COmponent General -> Oembed
* Remove Oembed tags from header
* Remove Remove Resource Hints tags from header
* rewrite rules update to match only non base, from (.*) to (.+)
* wph-throw-404 improvements
* BuddyPress conflict handle for uploaded gravatars
* Admin Style changes
* BuddyPress Conflict Class handler
* Separate WordPress meta Generator and Other Meta Generator
* Process Location value within sent Headers list if exists
* Replacements for https and http urls relative to domain
* Add replacements for relative paths to cover WordPress installs within a folder.
* Use untralingslashit when creating theme and child theme url replacements
* Fix for Call to a member function is_404() on a non-object within wp_redirect

See full list of changelogs at http://www.wp-hide.com/plugin-changelogs/

== Upgrade Notice ==

Always keep plugin up to date.


== Localization ==
Please help and translate this plugin to your language at <a href="https://translate.wordpress.org/projects/wp-plugins/wp-hide-security-enhancer">https://translate.wordpress.org/projects/wp-plugins/wp-hide-security-enhancer</a>

Please help by promoting this plugin with an article on your site or any other place. If you liked this code or helped with your project, consider to leave a 5 star review on this board.