!#/usr/bin/php
<?PHP

function ft_is_sort($sort)
{
	$count = 0;
	$default = $sort;
	sort($sort);
	foreach ($sort as $elem)
	{
		if ($elem != $default[$count])
			return (0);
		$count++;
	}
	return (1); 
}

?>