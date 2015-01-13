#!/usr/bin/php
<?
date_default_timezone_set('CET');
$handle = fopen("/var/run/utmpx", "r");
while ($utmpx = fread($handle, 628))
{
	$utmpx_unpacked = unpack("a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad", $utmpx);
	if ($utmpx_unpacked["type"] == 7)
	{
		$user[$utmpx_unpacked["line"]] = array("user" => $utmpx_unpacked["user"], "time" => $utmpx_unpacked["time1"]);
	}
}
ksort($user);
foreach($user as $line => $data)
{
		printf("% -7s  % -7s  %s \n", $data["user"], $line, date("M  j H:i", $data["time"]));
}
?>
