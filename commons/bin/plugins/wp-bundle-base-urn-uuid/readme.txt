=== urn:uiuid as the_guid ===
Contributors: geekysoft
Tags: preview links
Requires at least: 4.7
Tested up to: 4.9.4
Stable tag: 1.1
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Use an urn:uuid:<uuid4> for the_guid rather than using the_permalink.

== Description ==

Changes the_guid, the unique entry identifier as used in syndication feeds (Atom/RSS), from the entry/post’s permalink to an UUID version 4 URN. This serves as a new persistent unique identifier for each post that doesn’t reference the site’s own URL; allowing for the URL to change later without changing the GUID.

*Rewrites all your existing GUIDs* when activated. This plugin should only be installed on new sites or before you plan to change the URL of your WordPress installation anyway.

Makes your syndication feeds compatible with systems that requires persistent unique identifiers other than URLs (e.g. some library systems) while remaining compatible with feed readers.


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/urn-uuid` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the ‘Plugins’ screen in WordPress.

== Changelog ==

= 1.1 =

* Switch to WordPress internal logic for generating UUIDs.

= 1.0 =

* Initial public release.

= 0.8 =

* Here be dragons.
