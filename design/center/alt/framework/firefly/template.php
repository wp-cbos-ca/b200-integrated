<?php

defined( 'FIREFLY' ) || exit;

function get_firefly_html(){

	/** Construct the page on the "engine" page */
	$page = get_firefly_page();
	
	header('Content-type: text/html; charset=utf-8;');
	$str = '<!DOCTYPE html>' . PHP_EOL;
	$str .= sprintf( '<html lang="%s">%s', SITE_LANG, PHP_EOL);
	$str .= '<head>' . PHP_EOL;
	$str .= sprintf( '<meta charset="%s">%s', SITE_CHARSET, PHP_EOL );
	$str .= '<meta name="viewport" content="width=device-width, initial-scale=1"/>' . PHP_EOL;
	$str .= sprintf( '<title>%s</title>%s', $page['page-title'], PHP_EOL );
	$str  .= SITE_INDEX_ALLOW ? '' : '<meta name="robots" content="noindex,nofollow" />' . PHP_EOL;
	$str .= ! SITE_USE_MIN ? '<link rel=stylesheet href="/theme/css/style.css">' . PHP_EOL : '';
	$str .= SITE_USE_MIN ? '<link rel=stylesheet href="/theme/css/style.min.css">'  . PHP_EOL : '';
	$str .= SITE_USE_FONTS ? '<link rel=stylesheet href="/theme/font/font.css">' . PHP_EOL : '';
	$str .= SITE_USE_SPACING ? '<link rel=stylesheet href="/theme/css/spacing.css">'  . PHP_EOL : '';
	$str .= SITE_USE_COLOR ? '<link rel=stylesheet href="/theme/css/color.css">' . PHP_EOL : '';
	$str .= SITE_USE_CHILD ? '<link rel=stylesheet href="/theme/css/child.css">'  . PHP_EOL : '';
	$str .= '</head>' . PHP_EOL;
	$str .= '<body>' . PHP_EOL;
	$str .= '<div class="wrap">' . PHP_EOL;
	$str .= '<div class="inner">' . PHP_EOL;
	$str .= $page['header'];
	$str .= $page['article'];
	$str .= '</div>' . PHP_EOL; //inner
	$str .= $page['sidebar'];
	$str .= '</div>' . PHP_EOL; //wrap
	$str .= $page['footer'];
	$str .= SITE_ELAPSED_TIME ? get_firefly_elapsed() : '';
	$str .= '</body>' . PHP_EOL;
	$str .= '</html>';
	
	return $str;
}

/** Get the elapsed time from when the request first reached the server, to just before the end */
function get_firefly_elapsed(){
	
	global $site_elapsed;
	
	/** Explains the meaning of the time to the end user */
	$msg = 'Time (in milliseconds) to process the underlying code from when the request reaches the server to just before it leaves the server. Lower numbers are better.';
	
	/** End time to four decimal places in seconds (float) */
	$site_elapsed['end'] = microtime( true );
	
	/** Calculates elapsed time (accurate to 1/10000 seconds). Expressed as milliseconds */
	$time = number_format( ( $site_elapsed['end'] - $site_elapsed['start'] ) * 1000, 2, '.', ',' );
	
	$str = '<div id="elapsed-time" class="subdued text-center" ';
	$str .= sprintf( 'title="%s">Elapsed: %s ms</div>%s', $msg, $time , PHP_EOL ) ;
	
	return $str;
}