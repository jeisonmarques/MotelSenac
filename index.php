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
$result = $user->queryAll("SELECT * FROM Motel");

foreach ($result as $key => $val) {
    printr(sprintf("Chave: %s => Valor: %s", $key, $val));
		
}
foreach ($result as $key => $value[0]) {
    echo "Key: $key; Value: $value<br />\n";
}

foreach ($result as $key => $val) {
    printr($val["IdMotel"]);
	printr($val["Nome"]);
	printr($val["Latitude"]);
	printr($val["Longitude"]);
}

?>