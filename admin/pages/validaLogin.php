<?php

require "classCliente.php";

 ini_set('default_charset','UTF-8'); 

 $email = $_POST["email"];
 $senha = $_POST["senha"];
 
$email = $_POST["usuario"];
$senha = $_POST["senha"];   

$a = new usuario;
$a->setemail($email);
$a->setsenha($senha);
$rs = $a->logar();

$numero_linhas = mysql_num_rows($rs);

if ($numero_linhas>0){
	header("Location:index.html");
}
 
?>