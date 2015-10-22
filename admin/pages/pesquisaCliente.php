<?
	require "classCliente.php";

	$nome = $_POST["nome"];

	$a = new cliente;
	$a->setnome($nome);
	$i = $a->pesquisar();

	header("Location: cadCliente.html");
?>