<?php
/*
Plugin Name: WP Bundle Required urn:uiuid as the guid
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-required-urn-uuid/
Description: Use an urn:uuid(4) for the guid rather than using the permalink (Required).
Version: 2018.06.01
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

/*
Original Plugin Name: urn:uiuid as the_guid
Original Plugin URI:  https://www.geeky.software/wordpress-plugins/urn-uuid/
Original Description: Use an urn:uuid:<uuid4> for the_guid rather than using the_permalink.
Original Version:     1.1
Original Author:      Geeky Software
Original Author URI:  https://www.geeky.software/
License:     GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

defined('ABSPATH') || exit;

function urn_uuid_new_uuidv4_urn() {
  $uuid = wp_generate_uuid4();
  $uuid = "urn:uuid:${uuid}";

  return $uuid;
}

function urn_uuid_replace($post_id = 0, $post = NULL, $update = false) {
  global $wpdb;

  // only overwrite the guid for new posts
  if ($update) {
    return false;
  }

  // check if post already uses an uuid for guid
  $existing_id = get_the_guid($post_id);
  if (strpos($existing_id, 'urn:uuid:') === 0) {
    return false;
  }

  $uuid = urn_uuid_new_uuidv4_urn();

  if ($uuid) {
    $wpdb->update($wpdb->posts, array('guid' => $uuid), array('ID' => $post_id));
    return true;
  }

  return false;
}

add_action('save_post_post', 'urn_uuid_replace', 10, 3);
add_action('urn_uuid_firstrunner', 'urn_uuid_replace', 10, 3);
  
if (is_admin()) {
  if (get_option('urn_uuid_firstrun', '0') == '0') {
   update_option('urn_uuid_firstrun', '1');

  $these_posts = get_posts(array(
      'offset' => 0,
      'orderby' => 'rand',
      'posts_per_page' => -1,
      'post_type' => 'post' ));

    $delay = time() + 30;
    foreach ($these_posts as $postkey => $post) {
      wp_schedule_single_event($delay, 'urn_uuid_firstrunner', array($post->ID, NULL, false));
      $delay += 6;  // +6 seconds
  } }

  function urn_uuid_deactivate() {
    // unschedule every possible scheduled task.
    $these_posts = get_posts( array(
      'offset' => 0,
      'orderby' => 'rand',
      'posts_per_page' => -1,
      'post_type' => 'post' ));

    foreach ($these_posts as $postkey => $post) {
      wp_clear_scheduled_hook('urn_uuid_firstrunner', array( $post->ID, NULL, false));
    }
    register_deactivation_hook(__FILE__, 'urn_uuid_deactivate');
  }
}
