<?php
/**
Plugin Name: WP Bundle Base DNA
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-base-dna/
Description: Mimics actual DNA to store the site configuration in a set of text files. ...But, this is easier to configure...
Version: 2018.05.05
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'WP_POST_TYPE' ) ) {
	define( 'WP_POST_TYPE', 'post' );
}
if ( ! defined( 'WP_POST_TYPE_ALT' ) ) {
	define( 'WP_POST_TYPE_ALT', 'custom' ); //change if needed
}

function wp_site_installer_menu(){
	if ( current_user_can( 'manage_options' ) ) {
		require_once( dirname(__FILE__) . '/includes/template/template.php' );
		require_once( dirname(__FILE__) . '/includes/template/data.php' );
		$args = get_installer_data();
		add_management_page( $args['page_title'], $args['menu_title'], $args['capability'], $args['menu_slug'], $args['function'] );
	}
}
add_action( 'admin_menu', 'wp_site_installer_menu' );

function run_site_installer(){
	require_once( dirname(__FILE__) . '/data.php' );
	$items = get_installer_run_data();
	if ( $items['site_one']['run'] ) {
		load_site_one_files();
		run_site_one_files();
	}
	$items = get_installer_run_data();
	if ( $items['site_two']['run'] ) {
		load_site_two_files();
		run_site_two_files();
	}
	if ( $items['settings']['run'] ) {
		load_settings_files();
		run_settings_files();
	}
	if ( $items['content']['run'] ) {
		load_content_files();
		run_content_files();
	}
	if ( $items['sorting']['run'] ) {
		load_sorting_files();
		run_sorting_files();
	}
	if ( $items['images']['run'] ) {
		load_images_files();
		run_images_files();
	}
}

function load_site_one_files() {
	$items = get_site_one_data();
	if ( ! empty ( $items ) && is_array( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['run'] && ! $item['ran'] ) {
					$file = dirname(__FILE__) . '/' . $item['name'] . '/' . $item['name'] . '.php';
					if ( file_exists( $file ) ) {
						require_once( $file );
				}
			}
		}
	}
}

function run_site_one_files() {
	$items = get_site_one_data();
	if ( ! empty ( $items )  && is_array( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['run'] && ! $item['ran'] ) {
				switch( $item['name'] ) {
					case 'https':
						configure_https();
						break;
					case 'dashboard':
						configure_dashboard_user();
						break;
					case 'themes':
						activate_themes();
						break;
					case 'theme':
						configure_theme_plugins();
						break;
					case 'plugins':
						//configure_plugins();
						wp_bundle_dna_activate_plugins();
						break;
					case 'users':
						install_users();
						break;
					default:   
				}
			}
		}
	}
}

function load_site_two_files() {
	$items = get_site_two_data();
	if ( ! empty ( $items ) && is_array( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['run'] && ! $item['ran'] ) {
				$file = dirname(__FILE__) . '/' . $item['name'] . '/' . $item['name'] . '.php';
				if ( file_exists( $file ) ) {
					require_once( $file );
				}
			}
		}
	}
}

function run_site_two_files() {
	$items = get_site_two_data();
	if ( ! empty ( $items )  && is_array( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['run'] && ! $item['ran'] ) {
				switch( $item['name'] ) {
					case 'clean':
						default_cleaner();
						break;
					case 'menus':
						install_menus();
						break;
					case 'menu-locations':
						assign_menus();
						break;
					case 'widgets':
						configure_widgets();
						break;
					default:   
				}
			}
		}
	}
}

function load_settings_files() {
	$items = get_settings_data();
	if ( ! empty ( $items ) && is_array( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['run'] && ! $item['ran'] ) {
				$file = dirname(__FILE__) . '/settings/' . $item['name'] . '/' . $item['name'] . '.php';
				if ( file_exists( $file ) ) {
					require_once( $file );
				}
			}
		}
	}
}

function run_settings_files() {
	$items = get_settings_data();
	if ( ! empty ( $items )  && is_array( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['run'] && ! $item['ran'] ) {
				switch( $item['name'] ) {
					case 'general':
						install_general_settings();
						break;
					case 'writing':
						install_writing_settings();
						break;
					case 'reading':
						install_reading_settings();
						break;
					case 'discussion':
						install_discussion_settings();
						break;
					case 'media':
						install_media_settings();
						break;
					case 'permalinks':
						install_permalink_settings();
						break;
					case 'timezone':
						install_timezone_settings();
						break;
					default:   
				}
			}
		}
	}
}

function load_content_files() {
	$items = get_content_data();
	if ( ! empty ( $items ) && is_array( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['run'] && ! $item['ran'] ) {
				$file = dirname(__FILE__) . '/' . $item['name'] . '/' . $item['name'] . '.php';				
				if ( file_exists( $file ) ) {
					require_once( $file );
				}
			}
		}
	}
}

function run_content_files() {
	$items = get_content_data();
	if ( ! empty ( $items )  && is_array( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['run'] && ! $item['ran'] ) {
				switch( $item['name'] ) {
					case 'pages':
						install_pages();
						break;
					case 'page-block':
						install_page_block();
						break;
					case 'posts':
						install_posts();
						break;
					case 'post-block':
						install_posts_block();
						break;
					case 'post-type':
						install_post_type();
						break;
					case 'post-type-block':
						install_post_type_block();
						break;
					default:	
				}
			}
		}
	}
}

function load_images_files() {
	$items = get_image_data();
	if ( ! empty ( $items ) && is_array( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['run'] && ! $item['ran'] ) {
				$file = dirname(__FILE__) . '/' . $item['name'] . '/' . $item['name'] . '.php';
				if ( file_exists( $file ) ) {
					require_once( $file );
				}
			}
		}
	}
}

function run_images_files() {
	$items = get_image_data();
	if ( ! empty ( $items )  && is_array( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['run'] && ! $item['ran'] ) {
				switch( $item['name'] ) {
					case 'images':
						install_featured_images();
						break;
					default: 
				}
			}
		}
	}
}

function load_sorting_files() {
	$items = get_sorting_data();
	if ( ! empty ( $items ) && is_array( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['run'] && ! $item['ran'] ) {
				if ( strpos( $item['name'], 'tags-' ) !== FALSE ) {
					$file = dirname(__FILE__) . '/tags/' . $item['name'] . '/' . $item['name'] . '.php';
				}
				else if ( strpos( $item['name'], 'cats-' ) !== FALSE ) {
					$file = dirname(__FILE__) . '/categories/' . $item['name'] . '/' . $item['name'] . '.php';
				}
				else {
					$file = dirname(__FILE__) . '/' . $item['name'] . '/' . $item['name'] . '.php';
				}
				if ( file_exists( $file ) ) {
					require_once( $file );
				}
			}
		}
	}
}

function run_sorting_files() {
	$items = get_sorting_data();
	if ( ! empty ( $items )  && is_array( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['run'] && ! $item['ran'] ) {
				switch( $item['name'] ) {
					case 'categories':
						install_categories();
						break;
					case 'cats-assign':
						assign_categories();
						break;
					case 'tags':
						install_tags();
						break;
					case 'tags-assign':
						assign_tags_to_posts();
						break;
				}
			}
		}
	}
}

if ( ! function_exists( 'is_localhost' ) ) {
	function is_localhost() {
		$whitelist = array( '127.0.0.1', '::1' );
		if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
			return true;
		}
	}
}

function global_remove_welcome_panel() {
	global $wp_filter;
	unset( $wp_filter['welcome_panel'] );
}
add_action( 'wp_dashboard_setup', 'global_remove_welcome_panel' );

function wpsi_add_dashboard_widget() {
	$args = array( 'slug' => 'wpsi_dashboard_widget', 'title' => 'WP Site DNA', 'function' => 'wpsi_function' );
	wp_add_dashboard_widget( $args['slug'], $args['title'], $args['function'] );
}
add_action( 'wp_dashboard_setup', 'wpsi_add_dashboard_widget' );

function wpsi_function() {
	$str = sprintf( 'WP Site DNA can be found at <strong><a href="%s">Tools: WP Site DNA</a>.</strong>', admin_url( '/tools.php?page=wp-site-dna' ) );
	$str .= '<p>Click <strong>Run Site DNA</strong> to run the installer. ';
	$str .= 'The settings are found in the plugin file and can be edited ';
	$str .= 'with a simple text editor and uploaded with your favourite ftp program. ';
	$str .= 'This approach is chosen to make these settings less prone to change as once ';
	$str .= 'configured the entire site configuration can be stored here. ';
	$str .= 'Click "Screen Options" above, and then uncheck "WP Site DNA" to dismiss this notice.</p>';
	echo $str;
}
