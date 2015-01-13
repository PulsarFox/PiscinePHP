#!/usr//bin/php
<?PHP


function ft_split($str)
{
    $str = eregi_replace("[ ]+", " ", $str);
    $tab = explode(" ", $str);
    return ($tab);
}

$tab = ft_split($argv[1]);
$first = array_shift($tab);
foreach ($tab as $elem)
		echo ($elem)." ";
echo $first."\n";
?>