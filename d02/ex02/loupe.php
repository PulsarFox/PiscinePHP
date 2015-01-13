#!/usr/bin/php
<?PHP

if ( $argc != 2 )
	return ;
$str = null;
if ( !file_exists( $argv[1] ) || ( $str = file_get_contents( $argv[1] ) ) )
	return ;
function loupe( $prev_matches ) {
	$str = preg_replace_callback( array('/(>)(.*?)(<)/s', '/(title=")(.*?)(")/s'), function ( $matches ) { return ($matches[1] . strtoupper( $matches[2]) . $matches[3] ); }, $prev_matches[0]);
	return ( $str );
};
$pattern = '/<a href=(.*?)>(.*?)<\/a>/s';
$str = preg_replace_callback( $pattern, "loupe", $str );
echo ( $str );
?>
