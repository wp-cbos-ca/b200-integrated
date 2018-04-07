<?php
  
defined( 'ABSPATH' ) || exit;

function get_installer_data() {
	$items = array( 
		'page_title' => 'WP Site DNA',
		'menu_title' => 'WP Site DNA',
		'capability' => 'manage_options',
		'menu_slug' => 'wp-site-dna',
		'function' => 'the_site_installer_template',
		);
		return $items;
}

function get_template_data(){
	$items = array(
		'title' => 'Run Site DNA',
		'desc' => 'See plugin file for detail settings.',
		'button_text' => 'Run Site DNA',
		'help' => get_help_data(),
	);
	return $items;
}

function get_help_data(){
	$str = '<div style="font-size: 80% !important;">' . PHP_EOL;
	
	$str .= '<p>This installer is broken into five parts: site, settings, content, images and sorting. ';
	$str .= 'The <strong>site</strong> section cleans out pre-installed default content, and adds a ';
	$str .= 'stock set of menus. It also has the capability to add users, ';
	$str .= '(widgets, although this api is not yet that well developed), activate ';
	$str .= 'the chosen theme, and activate the selected plugins.</p>'. PHP_EOL;
	
	$str .= '<p>The <strong>settings</strong> section works through the settings as they appear in the ';
	$str .= 'Settings menu and simply starts at the top and ends at the bottom. ';
	$str .= 'This includes General, Writing, Reading, Discussion, Media and Permalinks. ';
	$str .= 'The timezone is separated out as it is easy to overlook.</p>'. PHP_EOL;
	
	$str .= '<p>The <strong>content</strong> section has the capability to add pages and posts with user-defined ';
	$str .= 'titles, slugs, guids and content, a page block with user defined ';
	$str .= 'title prefix and number of pages to create and a post block with user defined ';
	$str .= 'title prefix and number of posts to create as well as one custom post type and post ';
	$str .= 'type block (same as for the posts block). The <strong>images</strong> section has the capability to assign a selected featured ';
	$str .= 'image to posts and/or pages and has been separated out to allow for further enhancements.</p>' . PHP_EOL;
	
	$str .= '<p>Finally, the <strong>sorting</strong> section installs user defined categories and tags ';
	$str .= 'and has the capabilit to randomly assign the categories and tags to ';
	$str .= 'pre-existing pages and/or posts to create a realistic looking ';
	$str .= 'scenario for development.</p>' . PHP_EOL; 
	
	$str .= '<p>This idea, along with the WordPress bundle it is currently included ';
	$str .= 'with has been over a year in the making. If you like, you can head over to ';
	$str .= 'GitHub to <a href="https://github.com/wp-cbos-ca/">look me up</a> and ';
	$str .= 'follow and/or contribute to it&apos;s development, or purchase a copy of ';
	$str .= 'the WordPress bundle it is packaged with at <a href="http://wp.cbos.ca">wp.cbos.ca</a> ';
	$str .= 'to aid with development.</p>' . PHP_EOL;
	
	$str .= '<p>Each component can be controlled individually with dip switch like ';
	$str .= 'settings so you have the choice whether or not to load and run each of ';
	$str .= 'the site, settings and content sections as well as whether or not to run, ';
	$str .= 'activate or configure each individual component.</p>' . PHP_EOL;
	
	$str .= '<p>These dip switch like settings are currently found in the code itself in the files labelled data.php. ';
	$str .= 'Thus to work with this plugin at this point you will need to make use of a freely available editor such as Notepad++ or better ';
	$str .= 'and a freely available (s)ftp program such as Filezilla or alternate.</p>';
	
	$str .= '<p>It follows a "holographic" style of programming which is fairly easy to work with and understand ';
	$str .= 'as each successive layer (whether drilling down deeper or zoning out to an upper layer) is simply a repeat of the same pattern seen at each of the other layers.</p>' . PHP_EOL;
	
	$str .= '<p>Thanks for stopping by, and hope you have a wonderful day.</p>' . PHP_EOL;
	$str .= '</div>' . PHP_EOL;
	return $str;
}
