=== Recently Updated Pages and Posts ===
Contributors: salzano
Tags: recent updates, newest posts, list updated posts, list updated pages, list pages
Requires at least: 2.8
Tested up to: 5.9.0
Stable tag: 1.0.0

Creates a sidebar widget that lists recently updated pages and posts including newly published items.

== Description ==

This plugin displays a list of links to recently modified items in any WordPress widget area. 

== Installation ==

1. Download recently-updated-pages-and-posts.zip
2. Decompress the file contents
3. Upload the recently-updated-pages-and-posts folder to a Wordpress plugins directory (/wp-content/plugins)
4. Activate the plugin from the Administration Dashboard
5. Open the Widgets page under the Appearance section
6. Drag the widget to an active sidebar

== Frequently Asked Questions ==

= Need help? Have a suggestion? =
[Visit this plugin's home page](http://www.tacticaltechnique.com/wordpress/wordpress-recently-updated-pages-or-posts/)

== Screenshots ==

1. Sample output

== Change Log ==

= 1.0.0 = 
* [Changed] Implements semantic version numbers starting with 1.0.0

= 0.120223 =
* Shrunk the code by introducing wp_trim_words instead of my own function 

= 0.120218 =
* Removed original post date from display that was introduced with the last update
* Fixed 0 word excerpt length so no excerpts can be shown

= 0.120212 =
* Upgraded code to use 2.8 Widget API
* Added option to control custom excerpt length

= 0.101219 =
* Added element ID attributes to promote the use of CSS
* Customizable title and number of items to show

= 0.101018 =
* First build

== Upgrade Notice ==

= 0.120223 = 
This plugin now works better on less code. I was able to use a built in WP function I never knew of, wp_trim_words.

= 0.120218 =
This update contains two fixes after the last release. I introduced more features than I intended with the last update. This update removes the original post date from showing in the widget below each post title. I also introduced excerpts as a new feature, but users that do not want excerpts to show did not have a way to maintain that behavior. Now, an excerpt length of 0 words will not show any post excerpt.

= 0.120212 =
This update improves the code to the 2.8 Widget API and adds an option to choose your own excerpt length.

= 0.101219 =
This version introduces CSS friendly HTML elements and a widget options screen. The title of the widget and the number of items to show can now be customized.

= 0.101018 =
First build
