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

class Integrated_Framework_CSS {
	
public function css() {
	if ( file_exists( __DIR__ . '/../css/design.css' ) ){
		
		$css .= file_get_contents( __DIR__ . '/../css/design.css' );
		$data = new Integrated_Framework_Data();
		$types = $data->types();
		$size = $data->sizes();
		
		$css = '<style>';
		$css .= $this->types( $size );
		$css .= '</style>' . PHP_EOL;
		return $css;
	}
	else {
		return false;
	}
}

/**
 * Now, we need to start from the center and then calculate out from there.
 * The HTML model starts from the top left. To calculate the center, we
 * need to know the width and height of the containing element. Once we
 * have that, we can calculate the center. Also, we want to separate out the
 * generation of the css from the calculate. To the extent that this css is generic
 * we should be able to do that.
 */

private function types(){
	$css = '';
	$data = new Integrated_Framework_Data();
	$types = $data->types();
	$size = $data->sizes();
	foreach ( $types as $type ){
		$css .= sprintf( ".type-%s {%s", $type['id'], PHP_EOL );
		$css .= sprintf( "\ttop: %spx;%s", $type['id'] * 20, PHP_EOL );
		$css .= '}' . PHP_EOL;
		$css .= PHP_EOL;

		$css .= sprintf( ".type-%s .group {%s", $type['id'], PHP_EOL );
		$css .= sprintf( "\twidth: %spx;%s", $type['size'] * $size['group']['width'], PHP_EOL );
		$css .= sprintf( "\theight: %spx;%s", $type['size'] * $size['group']['height'], PHP_EOL );
		$css .= sprintf( "\tmargin-left: -%spx;%s", $type['size'] * $size['group']['width'] / 2, PHP_EOL );
		$css .= sprintf( "\tmargin-top: -%spx;%s", $type['size'] * $size['group']['height'] / 2, PHP_EOL );
		$css .= sprintf( "\tbackground-color: %s !important;%s", $type['color']['hex'], PHP_EOL );
		$css .= '}' . PHP_EOL;
		$css .= PHP_EOL;
		
		$css .= sprintf( ".type-%s .group-text {%s", $type['id'], PHP_EOL );
		$css .= sprintf( "\tleft: %spx;%s", $type['size'] * $size['group']['width'] / 2 + $size['adjust']['left'], PHP_EOL );
		$css .= sprintf( "\ttop: %spx;%s", $type['size'] * $size['group']['height'] / 2 + $size['adjust']['top'], PHP_EOL );
		$css .= sprintf( "\tfont-size: %s%%;%s", $type['size'] * 90, PHP_EOL );
		$css .= '}' . PHP_EOL;
		$css .= PHP_EOL;

		$css .= sprintf( ".type-%s .role {%s", $type['id'], PHP_EOL );
		$css .= sprintf( "\twidth: %spx;%s", $type['size'] * $size['role']['width'], PHP_EOL );
		$css .= sprintf( "\theight: %spx;%s", $type['size'] * $size['role']['height'], PHP_EOL );
		$css .= sprintf( "\tmargin-left: -%spx;%s", $type['size'] * $size['role']['width'] / 2, PHP_EOL );
		$css .= sprintf( "\tmargin-top: -%spx;%s", $type['size'] * $size['role']['height'] / 2, PHP_EOL );
		$css .= sprintf( "\tline-height: %spx;%s", $type['size'] * $size['role']['height'] - 4, PHP_EOL );
		$css .= $this->roles( $type, $size );
		$css .= '}' . PHP_EOL;
		$css .= PHP_EOL;
		
	}
	return $css;
}

private function roles( $type, $size ){

	$css = '';
	$pos['pos11']['left'] = round( $type['size'] * $size['group']['width'] * 5/16 ) + $size['adjust']['left'];
	$pos['pos12']['left'] = round( $type['size'] * $size['group']['width'] * 11/16 ) + $size['adjust']['left'];
	$pos['pos21']['left'] = round( $type['size'] * $size['group']['width'] * 3/16 ) + $size['adjust']['left'];
	$pos['pos22']['left'] = round( $type['size'] * $size['group']['width'] * 13/16 ) + $size['adjust']['left'];
	$pos['pos31']['left'] = round( $type['size'] * $size['group']['width'] * 5/16 ) + $size['adjust']['left'];
	$pos['pos32']['left'] = round( $type['size'] * $size['group']['width'] * 11/16 ) + $size['adjust']['left'];
	
	$pos['pos11']['top'] = round( $type['size'] * $size['group']['height'] * 3/16 ) + $size['adjust']['top'];
	$pos['pos12']['top'] = round( $type['size'] * $size['group']['height'] * 3/16 ) + $size['adjust']['top'];
	$pos['pos21']['top'] = round( $type['size'] * $size['group']['height'] * 1/2 ) + $size['adjust']['top'];
	$pos['pos22']['top'] = round( $type['size'] * $size['group']['height'] * 1/2 ) + $size['adjust']['top'];
	$pos['pos31']['top'] = round( $type['size'] * $size['group']['height'] * 13/16 ) + $size['adjust']['top'];
	$pos['pos32']['top'] = round( $type['size'] * $size['group']['height'] * 13/16 ) + $size['adjust']['top'];
	
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

/**
 * Generate the width, height, left and top, from center
 *
 * @return array
 */
private function css_calc(){
	$scale['pxtoft'] = 1;
	$arr['width'] = 0;
	$arr['height'] = 0;
	$arr['margin-left'] = 0;
	$arr['margin-top'] = 0;
	return $arr;
}

/**
 * Generate the width, height, left and top, from center
 * 
 */
private function css_get(){

} 

} //end of class