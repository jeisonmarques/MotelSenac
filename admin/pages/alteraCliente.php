<?
	require "classes/Cliente.php";

	$id = $_POST["id"];
	$novoCliente = $_POST["novoCliente"];	

	$a = new cliente;
	$a->setid($id);
	$a->setnovoCliente($novoCliente);
	$i = $a->atualizar();

	header("Location: cadCliente.html");
?>