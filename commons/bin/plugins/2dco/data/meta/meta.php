<?php

defined( 'ABSPATH' ) || exit;

/**
 * Meta data such as scale, etc.
 *
 */


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
