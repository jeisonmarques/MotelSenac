<?php

require_once "vendor/autoload.php";

function printr($p)
{
    echo "<pre>";
    print_r($p);
    echo "</pre>";
}

use Connection\Database\PdoConnection;

$pdo = new PdoConnection();
$conn = $pdo->getInstance();

printr($conn);


?>