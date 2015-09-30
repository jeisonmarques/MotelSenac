<?php
$server = "tcp:v8xjjhajlw.database.windows.net,1433";
$username = "apl@v8xjjhajlw";
$password = "Sjm157304@";
$database = "motelAtVQaSrngqJ";
try
{
    $conn = new PDO("sqlsrv:server=$server ; Database = $database", $username, $password);
}
catch(Exception $e)
{
    die(print_r($e));
}
?>