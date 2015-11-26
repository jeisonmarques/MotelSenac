<?php

require "classes/classUsuarios.php";

 ini_set('default_charset','UTF-8'); 

 $email = $_POST["email"];
 $senha = $_POST["senha"]; 

 if($email == "" and $senha == ""){
  echo "O usuário e a senha não foram preenchidos";  
 } elseif ($email =="") {
    echo "O usuário não foi preenchido";        
 } elseif ($senha == "") {
   echo "A senha não foi preenchido";
 } elseif ($email and $senha != "") {
   }
   
$a = new usuarios;
$a->setemail($email);
$a->setsenha($senha);

$rs = $a->loga();

$numero_linhas = mysql_num_rows($rs);

if ($numero_linhas>0){
	header("Location:index.html");
} else {
	echo "<script>";
	echo " alert('Usuário não encontrado');      
        window.location.href='login.html';
      </script>";    		
}
?>