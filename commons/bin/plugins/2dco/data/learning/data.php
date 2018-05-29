<?php

defined( 'ABSPATH' ) || exit;

function get_2d_layout_role_grouping_data(){
	$items = [
	['code'=>'Tr','name'=>'Trades','slug'=>'trades','load' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['code'=>'At','name'=>'Arts','slug'=>'arts','load' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['code'=>'Ga','name'=>'Gardening','slug'=>'gardening','load' => 1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['code'=>'Mk','name'=>'Marketing','slug'=>'marketing','load' => 1,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	['code'=>'Sc','name'=>'Science','slug'=>'science','load' => 1,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	['code'=>'Ap','name'=>'Applied','slug'=>'applied','load' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']]
	];
	return $items;
}

function get_2d_learning_data(){
	$items = [
	['group'=>'Ln','code' =>'r','name'=>'Reading','load' => 1,'color'=>['hex'=>'#fde5cd','name'=>'orange']],
	['group'=>'Ln','code' =>'w','name'=>'Writing','load' => 1,'color'=>['hex'=>'#fff2cd','name'=>'yellow']],
	['group'=>'Ln','code' =>'t','name'=>'Arithmetic','load' => 1,'color'=>['hex'=>'#d8ead2','name'=>'green']],
	['group'=>'Ln','code' =>'a','name'=>'Art','load' => 1,'color'=>['hex'=>'#d1e0e5','name'=>'blue']],
	['group'=>'Ln','code' =>'m','name'=>'Music','load' => 1,'color'=>['hex'=>'#dad2e9','name'=>'violet']],
	['group'=>'Ln','code' =>'d','name'=>'Drama','load' => 1,'color'=>['hex'=>'#f4cccc','name'=>'red']]
	];
	return $items;
}
