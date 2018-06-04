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
	$str .= '<link rel=stylesheet href="/center/theme/css/style.css">' . PHP_EOL;
	$str .= '<link rel=stylesheet href="/center/theme/css/child.css">' . PHP_EOL;
	$str .= '</head>' . PHP_EOL;
	$str .= '<body>' . PHP_EOL;
	
	$str .= '<div class="notice" id="notice"></div>' . PHP_EOL;
	$str .= '<div class="container" id="site-container">' . PHP_EOL;
	$str .= $page['header'];
	$str .= '<div class="header-trim header-trim-bottom"></div><!-- trim; as in a house -->' . PHP_EOL;
	$str .= '<div class="site" id="site-wrap"><!-- wrapping site wide elements -->' . PHP_EOL;
	$str .= '<div class="section" id="section-wrap"><!-- wrapping section level elements -->' . PHP_EOL;
	$str .= '<div class="page" id="page-wrap"><!-- wrapping page level elements -->' . PHP_EOL;
	$str .= '<main role="main"><!-- content unique to the document -->' . PHP_EOL;
	$str .= $page['article'];
	$str .= '</div>' . PHP_EOL; //inner
	$str .= '<aside class="page" id="page-aside"></aside>' . PHP_EOL;
	$str .= '</main>' . PHP_EOL;
	$str .= '<nav class="page" id="page-nav"></nav>' . PHP_EOL;
	$str .= '</div><!-- .page -->' . PHP_EOL;
	$str .= '<aside class="section" id="section-aside"></aside>' . PHP_EOL;
	$str .= '<nav class="section" id="section-nav"></nav>' . PHP_EOL;
	$str .= '</div><!-- .section -->' . PHP_EOL;
	$str .= '<aside class="site" id="site-aside"></aside>' . PHP_EOL;
	$str .= '<nav class="site" id="site-nav"></nav>' . PHP_EOL;
	$str .= '</div><!-- .site -->' . PHP_EOL;
	$str .= '<div class="footer-trim footer-trim-top"></div>' . PHP_EOL;
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
	
	$str = '<footer class="message elapsed-time" id="elapsed-time" ';
	$str .= sprintf( 'title="%s"><div class="inner">Elapsed: %s ms</div></div>%s', $msg, $time , PHP_EOL ) ;
	
	return $str;
}