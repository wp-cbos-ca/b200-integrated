<?php

defined( 'ABSPATH' ) || exit;

function get_menu_assign_data() {
	$items = array ( 
		0 => array ( 
			'name' => 'Main Menu' , 
			'location' => 'primary' ,
			'assign' => 1 ,
		),
		1 => array ( 
			'name' => 'Secondary Menu' , 
			'location' => 'secondary' ,
			'assign' => 0 ,
		),
		2 => array ( 
			'name' => 'Footer Menu' , 
			'location' => 'footer' ,
			'assign' => 0 ,
		)
	);
	return $items;
}
