<?
	require "classPergunta.php";

	$nome = $_POST["nome"];

	$a = new pergunta;
	$a->setnome($nome);
	$i = $a->pesquisa();

	header("Location: telaResultadoPesquisaPergunta.php");
?>