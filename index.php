<?php

require_once "vendor/autoload.php";

function printr($p)
{
    echo "<pre>";
    print_r($p);
    echo "</pre>";
}

use Connection\Dao\User;

$user = new User();
$result = $user->query("SELECT * FROM Motel");

foreach ($result as $key => $val) {
    printr(sprintf("Chave: %s => Valor: %s", $key, $val));
}