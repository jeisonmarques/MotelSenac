<?
require "classes/classCliente.php";

$nome = $_POST["nome"];
$cnpj = $_POST["cnpj"];
$latitude = $_POST["latitude"];
$longitude = $_POST["longitude"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$cep = $_POST["cep"];
$end_logradouro = $_POST["end_logradouro"];
$end_numero = $_POST["end_numero"];
$end_bairro = $_POST["end_bairro"];
$end_cidade = $_POST["end_cidade"];

$a = new cliente;
$a->setnome($nome);
$a->setcnpj($cnpj);
$a->setend_logradouro($end_logradouro);
$a->setend_numero($end_numero);
$a->setend_bairro($end_bairro);
$a->setend_cidade($end_cidade);
$a->setend_cep($cep);
$a->setlatitude($latitude);
$a->setlongitude($longitude);
$a->setemail($email);
$a->setsenha($senha);


$i = $a->inseri();
echo "<script>";
		echo " alert('Cliente adicionado com sucesso');      
        window.location.href='cadCliente.html';
      </script>";
?>   
