<?
require "classes/classQuarto.php";

$descricao = $_POST["descricao"];
$cliente_id = $_POST["cliente_id"];
$valor_hora = $_POST["valor_hora"];

$a = new quartos;
$a->setcliente_id($cliente_id);
$a->setdescricao($descricao);
$a->setvalor_hora($valor_hora);

$i = $a->inseri();
echo "<script>";
		echo " alert('Quarto adicionado com sucesso');      
        window.location.href='cadQuarto.html';
      </script>";
?>   
