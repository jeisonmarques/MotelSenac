<?php
$mysql_host = "localhost"; # Usually doesn"t need modified
$mysql_db = " "; # Database name
$mysql_user = ""; # Username
$mysql_pass = ""; # Password
$link = mysql_connect ($mysql_host,$mysql_user,$mysql_pass);
if (!$link) {
  die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);
?>