=== Google Map for Gutenberg Block ===
Contributors: idesignbucket
Tags: map, google maps, block, gutenberg, gutenberg block, gutenberg editor, google maps for gutenberg, maps for gutenberg, gutenberg maps, full width, map styles, custom marker
Author URI: https://idesignbucket.com/
Requires at least: 4.9
Requires PHP: 5.2
Tested up to: 5.0
Stable tag: 1.27
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Google map for Gutenberg. Fast, Simple, Flexible with rich in features.


== Description ==
Google Maps for Gutenberg is a simple, lightweight flexible google map plugin which allows you to create a map with one click. It has tons of features such as full width map, 17 different custom map styles, custom width and height attributes. Easy and Flexible !!

Gutenberg is now a core feature so please update to WordPress v5, or install the <a href="https://wordpress.org/plugins/gutenberg/">Gutenberg plugin</a>.

This plugin **requires** WordPress `5.0` or greater.


= Plugin Features =

Works as any other Gutenberg block with the following settings:
* 17 Different Map Styles
* Scroll Zoom
* Map Width and Height Features
* Full Width Map Styles (Entire Screen)
* Upload Custom Marker for your map
* Easy and Flexible
* Customize Everything
* And many more..

== Installation ==
 
This plugin can be installed just like you would install any other WordPress plugin. Because Google Map embed require an API key you'll need to provide a valid API key in plugin settings as well. See the detailed steps below.
 
1. Install and activate the Gutenberg plugin if you are on a WordPress version <= `5.0`
2. Upload the plugin to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Obtain a Google Map embed API key (instructions below)
5. Visit the plugin settings from Tools > Google Map and enter/save your Google Map embed API key
6. Search for _Google Map_ when adding a new content block
7. Drag the marker to your preferred location
8. Optionally edit the advanced block settings

== API Key ==

This plugin requires an API key to interact with Google Maps. Without an API key maps will not be displayed.

To obtain an API key follow these steps:
1. Create a new project in the Google Developer's console by clicking [here](https://console.developers.google.com/flows/enableapi?apiid=maps_backend,static_maps_backend,maps_embed_backend&keyType=CLIENT_SIDE&reusekey=true) and selecting _Create new project_
2. Name your project
3. Select _HTTP referrers (web sites)_  for the _Key restriction_ type
4. Enter the domains where your API key will be used
    - Example: `*.mysite.com`
5. Click the _Create_ button
6. Write your API key down in a safe place
7. Enter the API key into the plugin settings

Note: The API key will be exposed publicly to generate the map. It is important to [restrict your API key](https://developers.google.com/maps/documentation/embed/get-api-key#key-restrictions) so others do not abuse it. The API key will be used, and displayed, in both the WordPress editor and the front end of the site.

== Screenshots ==
1. Animated `GIF` showing a demo of the plugin

== Changelog ==

= 1.0 =
* 2019-02-12
* initial release
