#!/usr/bin/php
<?PHP

$str = trim($argv[1]);
$str = eregi_replace("[ ]+", " ", $str);
echo "$str\n";

?>