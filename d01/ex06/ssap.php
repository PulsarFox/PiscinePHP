#!/usr/bin/php
<?PHP

$count = 0;
foreach ($argv as $elem)
{
	if ($count == 0)
	   $count = 1;
	else
		{
		if (!$str)
		   $str = $elem;
		else
			$str = "$str $elem";
		}
}
$str = eregi_replace("[ ]+", " ", $str);
$tab = explode(" ", $str);
sort($tab);
foreach ($tab as $elem)
{
	echo $elem."\n";
}
?>