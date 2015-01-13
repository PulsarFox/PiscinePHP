#!/usr/bin/php
<?PHP

if ($argc != 2)
	return ;
date_default_timezone_set('Europe/Paris');
$month = array("/Janvier/", "/Fevrier/", "/Mars/", "/Avril/", "/Mai/", "/Juin/", "/Juillet/", "/Aout/", "/Septembre/", "/Octobre/", "/Novembre/", "/Decembre/");
$nb_month = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");
$tab_date = explode(" ", $argv[1]);
if (count($tab_date) != 5)
{
		echo "Wrong Format\n";
		return ;
}
$tab_date[4] = explode(":", $tab_date[4]);
$tab_date[2] = ucfirst($tab_date[2]);
$tab_date[2] = preg_replace($month, $nb_month, $tab_date[2]);
$time = mktime($tab_date[4][0], $tab_date[4][1], $tab_date[4][2], $tab_date[2], $tab_date[1], $tab_date[3]);
echo $time."\n";
?>
