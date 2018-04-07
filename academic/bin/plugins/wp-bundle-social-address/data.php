<?php

defined( 'ABSPATH' ) || exit;

function get_wp_bundle_address_data() {
	$items = array( 
		array( 'name' => 'company', 'title' => 'Company', 'display' => 1 ),
		array( 'name' => 'lat', 'title' => 'Latitude', 'display' => 1 ),
		array( 'name' => 'lng', 'title' => 'Longitude', 'display' => 1 ),
		array( 'name' => 'address_1', 'title' => 'Address 1', 'display' => 1 ),
		array( 'name' => 'address_2', 'title' => 'Address 2', 'display' => 1 ),
		array( 'name' => 'city', 'title' => 'City',  'next_inline' => 1,  'display' => 1 ),
		array( 'name' => 'state_prov', 'title' => 'State/Prov.', 'next_inline' => 1, 'display' => 1 ),
		array( 'name' => 'zip_postal', 'title' => 'Zip/Postal', 'display' => 1 ),
		array( 'name' => 'country', 'title' => 'Country', 'display' => 1 ),
		array( 'name' => 'phone', 'title' => 'Phone', 'display' => 1 ),
		array( 'name' => 'fax', 'title' => 'Fax', 'display' => 1 ),
		array( 'name' => 'mobile', 'title' => 'Mobile', 'display' => 1 ),
		);
		return $items;
}
