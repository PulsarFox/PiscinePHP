#!/usr/bin/php
<?PHP

print (eregi_replace("[[:space:]]+", " ", trim($argv[1])));
echo "\n";

?>