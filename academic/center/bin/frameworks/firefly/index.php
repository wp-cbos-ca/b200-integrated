<?php

/** Used as a check to ensure files are being called correctly */
define( 'FIREFLY', true );

/** Set this according to the configs available below */
define( 'SITE_PRODUCTION', true );

if ( ! defined( 'SITE_ROOT_PATH' ) ){
	define( 'SITE_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] );
}

if ( file_exists ( SITE_ROOT_PATH . '/bin/alt/config/config-site.php' ) ){
	require_once( SITE_ROOT_PATH . '/bin/alt/config/config-site.php' );
}
else {
	echo "Please check the path to the config file";
}
require_once( __DIR__ . '/firefly/engine.php' );

$page = get_firefly_page();

$style_time = SITE_PRODUCTION ? '' : '?' . time();

header('Content-type: text/html; charset=utf-8;');
$str = '<!DOCTYPE html>' . PHP_EOL;
$str .= sprintf( '<html lang="%s">%s', SITE_LANG, PHP_EOL);
$str .= '<head>' . PHP_EOL;
$str .= sprintf( '<meta charset="%s">%s', SITE_CHARSET, PHP_EOL );
$str .= '<meta name="viewport" content="width=device-width, initial-scale=1"/>' . PHP_EOL;
$str .= sprintf( '<title>%s</title>%s', $page['page-title'], PHP_EOL );
$str  .= SITE_INDEX_ALLOW ? '' : '<meta name="robots" content="noindex,nofollow" />' . PHP_EOL;
$str .= ! SITE_PRODUCTION ? sprintf( '<link rel=stylesheet href="/theme/css/style.css%s">%s', $style_time, PHP_EOL ) : '';
$str .= SITE_PRODUCTION ? '<link rel=stylesheet href="/theme/css/style.css">' . PHP_EOL : '';
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

/** End time to four decimal places in seconds (float) */
global $site_elapsed;

$site_elapsed['end'] = microtime( true );

$str .= SITE_ELAPSED_TIME ? sprintf( '<div id="elapsed-time" class="subdued text-center" title="Time (in milliseconds) to process the underlying code from when the request reaches the server to just before it leaves the server. Lower numbers are better.">Elapsed: %s ms</div>%s', number_format( ( $site_elapsed['end'] - $site_elapsed['start'] ) * 1000, 2, '.', ',' ) , PHP_EOL ) : '';
$str .= '</body>' . PHP_EOL;
$str .= '</html>';
echo $str;
