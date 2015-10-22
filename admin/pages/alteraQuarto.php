<?
	require "classQuarto.php";

	$id = $_POST["id"];
	$novapergunta = $_POST["novaQuarto"];	

	$a = new quarto;
	$a->setid($id);
	$a->setnovoQuarto($novaQuarto);
	$i = $a->atualizar();

	header("Location: cadQuarto.html");
?>