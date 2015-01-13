#!/usr/bin/php
<?PHP

function ft_split($str)
{
	$str = eregi_replace("[ ]+", " ", $str);
	$tab = explode(" ", $str);
	sort($tab, SORT_STRING);
	return ($tab);
}
?>