<?php 

defined( 'ABSPATH' ) || exit;

/**
 * Calculate layout based on need. Generate CSS dynamically, then output.
 * Notes: Living, learning and working need to be in progressively larger circles.
 * Living is on the inside, learning is tucked in, just outside of the living circles
 * and working is nestled in, in a counter clockwise fashion, in between the gaps
 * created by the living and working sections.
 *
 * We have living, learning and working as three "types". They are assigned an "id",
 * in order: 1, 2 and 3. Thus We would use this (roughly) as determining distance from the center.
 * We will work from the center. Each of living, working and learning is identical in
 * the number of items and the naming of items. Indeed, this is the case, because
 * each is generated from the same array. They just receive a different overall title
 * and a different background color to distinguish them from each other. However,
 * learning will be smaller in size (about 2/3 of the others), and the border color
 * and font color will be greyed out.
 */

class Integrated_Framework_HTML {
	
public function css() {
	$file = __DIR__ . '/script/css/design.css';
	if ( file_exists( $file ) ){
		$css = '<style>';
		$css .= file_get_contents( $file );
		$css .= $this->get_2d_community_css_calculated();
		$css .= '</style>' . PHP_EOL;
		return $css;
	}
	else {
		return false;
	}
}

private function get_2d_community_css_calculated(){
	$data = new Integrated_Framework_Data();
	$types = $data->types();
	$css = '';
	$adjust['left'] = -2;
	$adjust['top'] = -4;
	foreach ( $types as $type ){
		$css .= sprintf( ".type-%s {%s", $type['id'], PHP_EOL );
		$css .= sprintf( "\ttop: %spx;%s", $type['id'] * 20, PHP_EOL );
		$css .= '}' . PHP_EOL;
		$css .= PHP_EOL;

		$css .= sprintf( ".type-%s .group {%s", $type['id'], PHP_EOL );
		$css .= sprintf( "\twidth: %spx;%s", $type['size'] * $group['width'], PHP_EOL );
		$css .= sprintf( "\theight: %spx;%s", $type['size'] * $group['height'], PHP_EOL );
		$css .= sprintf( "\tmargin-left: -%spx;%s", $type['size'] * $group['width'] / 2, PHP_EOL );
		$css .= sprintf( "\tmargin-top: -%spx;%s", $type['size'] * $group['height'] / 2, PHP_EOL );
		$css .= sprintf( "\tbackground-color: %s !important;%s", $type['color']['hex'], PHP_EOL );
		$css .= '}' . PHP_EOL;
		$css .= PHP_EOL;
		
		$css .= sprintf( ".type-%s .group-text {%s", $type['id'], PHP_EOL );
		$css .= sprintf( "\tleft: %spx;%s", $type['size'] * $group['width'] / 2 + $adjust['left'], PHP_EOL );
		$css .= sprintf( "\ttop: %spx;%s", $type['size'] * $group['height'] / 2 + $adjust['top'], PHP_EOL );
		$css .= sprintf( "\tfont-size: %s%%;%s", $type['size'] * 90, PHP_EOL );
		$css .= '}' . PHP_EOL;
		$css .= PHP_EOL;

		$css .= sprintf( ".type-%s .role {%s", $type['id'], PHP_EOL );
		$css .= sprintf( "\twidth: %spx;%s", $type['size'] * $role['width'], PHP_EOL );
		$css .= sprintf( "\theight: %spx;%s", $type['size'] * $role['height'], PHP_EOL );
		$css .= sprintf( "\tmargin-left: -%spx;%s", $type['size'] * $role['width'] / 2, PHP_EOL );
		$css .= sprintf( "\tmargin-top: -%spx;%s", $type['size'] * $role['height'] / 2, PHP_EOL );
		$css .= sprintf( "\tline-height: %spx;%s", $type['size'] * $role['height'] - 4, PHP_EOL );
		$css .= sprintf( "\tfont-size: %spx%s", $type['size'] * $role['font-size'], PHP_EOL );
		$css .= '}' . PHP_EOL;
		$css .= PHP_EOL;
		$css .= $this->get_2dco_css_roles_calculated( $type, $group, $role );
	}
	return $css;
}

/**
 * top row: 1/3 and 2/3 1/3 up
 * middle row 1/4 and 3/4 middle
 * bottom row: 1/3 and 2/3 2/3 down
 */
private function get_2dco_css_roles_calculated( $type, $group, $role ){
	$css = '';
	$adjust['left'] = -3;
	$adjust['top'] = -4;
	$pos['pos11']['left'] = round( $type['size'] * $group['width'] * 5/16 ) + $adjust['left'];
	$pos['pos12']['left'] = round( $type['size'] * $group['width'] * 11/16 ) + $adjust['left'];
	$pos['pos21']['left'] = round( $type['size'] * $group['width'] * 3/16 ) + $adjust['left'];
	$pos['pos22']['left'] = round( $type['size'] * $group['width'] * 13/16 ) + $adjust['left'];
	$pos['pos31']['left'] = round( $type['size'] * $group['width'] * 5/16 ) + $adjust['left'];
	$pos['pos32']['left'] = round( $type['size'] * $group['width'] * 11/16 ) + $adjust['left'];
	
	$pos['pos11']['top'] = round( $type['size'] * $group['height'] * 3/16 ) + $adjust['top'];
	$pos['pos12']['top'] = round( $type['size'] * $group['height'] * 3/16 ) + $adjust['top'];
	$pos['pos21']['top'] = round( $type['size'] * $group['height'] * 1/2 ) + $adjust['top'];
	$pos['pos22']['top'] = round( $type['size'] * $group['height'] * 1/2 ) + $adjust['top'];
	$pos['pos31']['top'] = round( $type['size'] * $group['height'] * 13/16 ) + $adjust['top'];
	$pos['pos32']['top'] = round( $type['size'] * $group['height'] * 13/16 ) + $adjust['top'];
	
	$i = 1;
	for ( $row=1; $row<=3; $row++ ){
		for ( $col=1; $col<=2; $col++ ){
			$css .= sprintf( ".type-%s .role-%s {%s", $type['id'], $i, PHP_EOL );
			$css .= sprintf( "\tleft: %spx;%s", $pos['pos' . $row . $col ]['left'], PHP_EOL );
			$css .= sprintf( "\ttop: %spx;%s", $pos['pos'  . $row . $col ]['top'], PHP_EOL );
			$css .= '}' . PHP_EOL;
			$css .= PHP_EOL;
			$i++;
		}
	}
	return $css;
}

public function html() {
	$community = '' . PHP_EOL;
	$community .= '<div id="community" class="community">' . PHP_EOL;
	$community .= '<div class="inner">' . PHP_EOL;
	$community .= $this->get_2d_community_inner_html();
	$community .= '<div class="text community-text">Commons</div>' . PHP_EOL;
	$community .= '</div><!-- .inner -->' . PHP_EOL;
	$community .= '</div><!-- #community -->' . PHP_EOL;
	return $community;
}

/**
 * live, learn, work
 * commons, learning, center
 */
private function get_2d_community_inner_html(){
	$data = new Integrated_Framework_Data();
	$types = $data->types();
	$html = '';
	foreach ( $types as $type ){
		if ( $type['load'] ){
			$html .= sprintf( '<div class="type type-%s %s">%s', $type['id'], $type['slug'], PHP_EOL );
			$html .= $this->get_2d_community_group_html();
			$html .= '<div><!-- .type -->' . PHP_EOL;
		}
	}
	return $html;
}

/** applied, trades, arts, academic, gardening, analysis */
private function get_2d_community_group_html(){
	$data = new Integrated_Framework_Data();
	$groups = $data->groups();
	$html = '';
	foreach ( $groups as $group ){
		if ( $group['load'] ){
			$html .= sprintf( '<section title="%s" class="group group-%s" style="background-color: %s">%s', $group['name'], $group['order'],$group['color']['hex'], PHP_EOL);
			$html .= '<div class="inner">';
			$html .= sprintf( '<div class="text group-text">%s</div>%s', $group['name'], PHP_EOL );
			$html .= $this->get_2d_community_role_html( $group );
			$html .= '</div><!-- .inner -->' . PHP_EOL;
			$html .= '</section>' . PHP_EOL;
		}
	}
	return $html;
}

private function get_2d_community_role_html( $group ) {
	$data = new Integrated_Framework_Data();
	$roles = $data->roles_tier_one();
	$str = '';
	foreach ( $roles as $role ){
		if ( $group['code'] == $role['group'] && $role['cast'] ){
			$str .= sprintf( '<div class="wrap role role-%s" style="background-color: %s">', $role['order'], $role['color']['hex'] );
			$str .= '<div class="inner">' . PHP_EOL;
			$str .= sprintf( '<div title="%s"><div class="inner">%s</div></div><!-- .title -->', $role['name'],  $role['code'] );
			$str .= '</div><!-- .inner --></div><!-- .role -->';
		}
	}
	return $str;
}
}
