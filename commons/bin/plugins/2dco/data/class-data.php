<?php

defined( 'ABSPATH' ) || exit;

/**
 * Title: Role Group Data and Tier 1 Role Data
 * Description: Groups roles and lists roles for the first expected needed.
 */
class Integrated_Framework_Data{

/**
 * Adjust top and left
 */
static function sizes(){
	$items = [
		'group' => ['width' => 200, 'height' => 200 ],
		'role' => [ 'width' => 50, 'height' => 50 ],
		'adjust' => ['left' => -4, 'top' => -2 ],
	];
	return $items;
}

/**
 * Table Name: 2d-role-type-data
 * Columns: code, name, slug, load, color[hex,name]
 *
 * red, orange, yellow, green, blue, violet
 *
 *@return array
 */
static function types(){
	$items = [
	['id'=>1, 'order'=>1,'code'=>'Li','name'=>'Living','slug'=>'living','size'=>1,'load'=>1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['id'=>2, 'order'=>2,'code'=>'Le','name'=>'Learning','slug'=>'learning','size'=>0.68,'load'=>1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['id'=>3, 'order'=>3,'code'=>'Wo','name'=>'Working','slug'=>'working','size'=>1,'load'=>0,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	];
	return $items;
}

/**
 * Table Name: two-dee-role-group-data
 * Columns: code, name, slug, load, color[hex,name]
 *
 * @return array
 */  
static function groups(){
	$items = [
	['order'=>6,'code'=>'Ap','name'=>'Applied','slug'=>'applied','load' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']],
	['order'=>3,'code'=>'Tr','name'=>'Trades','slug'=>'trades','load' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['order'=>1,'code'=>'At','name'=>'Arts','slug'=>'arts','load' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['order'=>2,'code'=>'Ga','name'=>'Garden','slug'=>'gardening','load' => 1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['order'=>4,'code'=>'An','name'=>'Analysis','slug'=>'analysis','load' => 1,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	['order'=>5,'code'=>'Sc','name'=>'Science','slug'=>'science','load' => 1,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	];
	return $items;
}

/**
 * Table Name: two-dee-role-data
 * Columns: group, code, name, cast, color[hex,name] 
 * 
 * @return array
 */
static function roles_tier_one(){
	$items = [
	['order'=>1,'group'=>'Tr','code' =>'Ca','name'=>'Carpenter','cast' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']],
	['order'=>6,'group'=>'Tr','code' =>'El','name'=>'Electrician','cast' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['order'=>3,'group'=>'Tr','code' =>'Pl','name'=>'Plumber','cast' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['order'=>2,'group'=>'Tr','code' =>'Dr','name'=>'Drywaller','cast' => 1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['order'=>4,'group'=>'Tr','code' =>'Rf','name'=>'Roofer','cast' => 1,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	['order'=>5,'group'=>'Tr','code' =>'Ma','name'=>'Mason','cast' => 1,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	
	['order'=>2,'group'=>'At','code' =>'Pi','name'=>'Pianist','cast' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']],
	['order'=>4,'group'=>'At','code' =>'Vi','name'=>'Violinist','cast' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['order'=>6,'group'=>'At','code' =>'Wi','name'=>'Wind','cast' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['order'=>5,'group'=>'At','code' =>'Po','name'=>'Potter','cast' => 1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['order'=>1,'group'=>'At','code' =>'Pa','name'=>'Painter','cast' => 1,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	['order'=>3,'group'=>'At','code' =>'Sc','name'=>'Sculptor','cast' => 1,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	
	['order'=>4,'group'=>'Ga','code' =>'Ga','name'=>'Gardener','cast' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']],
	['order'=>6,'group'=>'Ga','code' =>'Pr','name'=>'Processor','cast' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['order'=>5,'group'=>'Ga','code' =>'Ch','name'=>'Chef','cast' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['order'=>2,'group'=>'Ga','code' =>'Wa','name'=>'Water','cast' => 1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['order'=>1,'group'=>'Ga','code' =>'Ta','name'=>'Tailor','cast' => 1,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	['order'=>3,'group'=>'Ga','code' =>'Ph','name'=>'Physio','cast' => 1,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	
	['order'=>5,'group'=>'Sc','code' =>'Mh','name'=>'Math','cast' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']],
	['order'=>1,'group'=>'Sc','code' =>'Py','name'=>'Physics','cast' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['order'=>2,'group'=>'Sc','code' =>'Ch','name'=>'Chemist','cast' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['order'=>3,'group'=>'Sc','code' =>'Bc','name'=>'Biochem.','cast' => 1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['order'=>6,'group'=>'Sc','code' =>'Bi','name'=>'Biology','cast' => 1,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	['order'=>4,'group'=>'Sc','code' =>'Lo','name'=>'Logic','cast' => 1,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	
	['order'=>3,'group'=>'Ap','code' =>'Eg','name'=>'Engineer','cast' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']],
	['order'=>4,'group'=>'Ap','code' =>'Ax','name'=>'Architect','cast' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['order'=>2,'group'=>'Ap','code' =>'Ld','name'=>'Landscape','cast' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['order'=>1,'group'=>'Ap','code' =>'Or','name'=>'Organics','cast' => 1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['order'=>6,'group'=>'Ap','code' =>'Cd','name'=>'Code','cast' => 1,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	['order'=>5,'group'=>'Ap','code' =>'Ro','name'=>'Robotics','cast' => 1,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	
	['order'=>6,'group'=>'An','code' =>'Wr','name'=>'Writer','cast' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']],
	['order'=>1,'group'=>'An','code' =>'Sp','name'=>'Speaker','cast' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['order'=>3,'group'=>'An','code' =>'Ph','name'=>'Photographer','cast' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['order'=>5,'group'=>'An','code' =>'Ad','name'=>'Audio','cast' => 1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['order'=>4,'group'=>'An','code' =>'Vd','name'=>'Video','cast' => 1,'color'=>['hex'=>'#d1e0ef','name'=>'blue']],
	['order'=>2,'group'=>'An','code' =>'An','name'=>'Analytics','cast' => 1,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	
	];
	return $items;
}

/*
We need to define time, space and type parameters. Materials contruction, equipment, order and relationship. For space, we have x,y and z coordinates. Equipment can be quite different across different industries and jobs. For example office equipment is of a vastly different size and feel to a backhoe, dump truck and tractor, yet each could be classified as equipment.  We want each cluster to be self sufficient, so that if something happened to the others, or if one decided to replicate, they would have all the processes and information needed to do so. This means it would make sense to construct the file and database structure in the same way, mimicing the intended purpose of each cluster. Finally, we need to be able to define the relationship of one to the other and the weight that each component has. So that, if the component would cease functioning it, the effect on the other components could be immediately determined.
 */

/*
 time: y-m-d::hh-mm-ss
 center: x,y,z
 volume: cubic feet
 dim: length, width: height (l,w,h)
 weight: kg
 material volume:
 material weight: 
 modular: y/n
 position absolute: pos.abs
 position relatieve: pos.rel
 
 order of construction: 
 
 equipment needed: equip.
*/
}