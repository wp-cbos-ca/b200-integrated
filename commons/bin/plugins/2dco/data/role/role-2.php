<?php

defined( 'ABSPATH' ) || exit;

/**
 * Title: Tier 2 Role Data Using Role Grouping for Tier 1
 * Description: Groups roles and lists roles for the second expected needed. This second group should be complementary to the first.
 */

/**
 * Table Name: two-dee-role-data
 * Columns: group, code, name, cast, color[hex,name] 
 * 
 * @return array
 */

function get_tier_2_role_data(){
	$items = [
	['order'=>1,'group'=>'Tr','code' =>'Me','name'=>'Mechanic','cast' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']],
	['order'=>6,'group'=>'Tr','code' =>'Pl','name'=>'Plaster','cast' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['order'=>3,'group'=>'Tr','code' =>'So','name'=>'Solar','cast' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['order'=>2,'group'=>'Tr','code' =>'Hy','name'=>'Hydro','cast' => 1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['order'=>4,'group'=>'Tr','code' =>'Wi','name'=>'Wind','cast' => 1,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	['order'=>5,'group'=>'Tr','code' =>'Eq','name'=>'Equipment','cast' => 1,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	
	['order'=>2,'group'=>'At','code' =>'Mu','name'=>'Music','cast' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']],
	['order'=>4,'group'=>'At','code' =>'Ch','name'=>'Choir','cast' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['order'=>6,'group'=>'At','code' =>'Fr','name'=>'Framing','cast' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['order'=>5,'group'=>'At','code' =>'','name'=>'','cast' => 0,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['order'=>1,'group'=>'At','code' =>'','name'=>'','cast' => 0,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	['order'=>3,'group'=>'At','code' =>'','name'=>'','cast' => 0,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	
	['order'=>4,'group'=>'Ga','code' =>'Ga','name'=>'Gardener','cast' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']],
	['order'=>6,'group'=>'Ga','code' =>'Ch','name'=>'Chef','cast' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['order'=>5,'group'=>'Ga','code' =>'Ba','name'=>'Baker','cast' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['order'=>2,'group'=>'Ga','code' =>'St','name'=>'Stock','cast' => 1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['order'=>1,'group'=>'Ga','code' =>'','name'=>'','cast' => 0,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	['order'=>3,'group'=>'Ga','code' =>'Se','name'=>'Seamstress','cast' => 1,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	
	['order'=>5,'group'=>'Sc','code' =>'Bo','name'=>'Botanist','cast' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']],
	['order'=>1,'group'=>'Sc','code' =>'Ge','name'=>'Geneticist','cast' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['order'=>2,'group'=>'Sc','code' =>'Ec','name'=>'Ecologist','cast' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['order'=>3,'group'=>'Sc','code' =>'Hi','name'=>'Historian','cast' => 1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['order'=>6,'group'=>'Sc','code' =>'La','name'=>'Languages','cast' => 1,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	['order'=>4,'group'=>'Sc','code' =>'So','name'=>'Sociology','cast' => 1,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	
	['order'=>3,'group'=>'Ap','code' =>'Re','name'=>'Reclamation','cast' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']],
	['order'=>4,'group'=>'Ap','code' =>'Ve','name'=>'Veterinarian','cast' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['order'=>2,'group'=>'Ap','code' =>'Nu','name'=>'Nursing','cast' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['order'=>1,'group'=>'Ap','code' =>'Fo','name'=>'Food','cast' => 1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['order'=>6,'group'=>'Ap','code' =>'La','name'=>'Latin','cast' => 1,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	['order'=>5,'group'=>'Ap','code' =>'Pr','name'=>'Programmer','cast' => 1,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	
	['order'=>6,'group'=>'Mk','code' =>'En','name'=>'English','cast' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']],
	['order'=>1,'group'=>'Mk','code' =>'Vo','name'=>'Voice','cast' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['order'=>3,'group'=>'Mk','code' =>'Ph','name'=>'','cast' => 0,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['order'=>5,'group'=>'Mk','code' =>'Ad','name'=>'','cast' => 0,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['order'=>4,'group'=>'Mk','code' =>'Vd','name'=>'','cast' => 0,'color'=>['hex'=>'#d1e0ef','name'=>'blue']],
	['order'=>2,'group'=>'Mk','code' =>'Sp','name'=>'','cast' => 0,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	
	];
	return $items;
}

/**
 * Table Name: two-dee-center-data
 * Columns: code, name, slug, load, color[hex,name]
 *
 * @return array
 */

function get_2d_center_data(){
	$items = 
	[
		['code'=>'Tr','use'=>1,'center'=>['x'=>'','y'=>'','z'=>'']],
		['code'=>'At','use'=>1,'center'=>['x'=>'','y'=>'','z'=>'']],
		['code'=>'Ga','use'=>1,'center'=>['x'=>'','y'=>'','z'=>'']],
		['code'=>'Mk','use'=>1,'center'=>['x'=>'','y'=>'','z'=>'']],
		['code'=>'Sc','use'=>1,'center'=>['x'=>'','y'=>'','z'=>'']],
		['code'=>'Ap','use'=>1,'center'=>['x'=>'','y'=>'','z'=>'']],
	];
	return $items;
}

/**
 * Table Name: two-dee-meta-data
 * Columns: code, name, slug, load, color[hex,name]
 *
 * @return array
 */

function get_2d_meta_data(){
	$items =
	[
		['code'=>'Px','use'=>1,'pixel'=>['ratio'=>'2.0','unit'=>'foot']],
		['code'=>'Dw','use'=>1,'area'=>['value'=>'1.0','unit'=>'acre','shape'=>'circle']],
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
