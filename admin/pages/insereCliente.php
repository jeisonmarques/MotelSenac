<?
require "classCliente.php";

$nome = $_POST["nome"];

$a = new cliente;
$a->setnome($nome);
$i = $a->inserir();
header("Location: cadCliente.html");
?>   
