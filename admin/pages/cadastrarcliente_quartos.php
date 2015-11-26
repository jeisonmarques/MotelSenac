<?php
    if(isset($_POST)){
        include "classes/ClienteQuartos.php";
        include "dao/ClienteQuartosDAO.php";

        $idclientequartos   = $_POST["idclientequartos"];
        $idcliente          = $_POST["idcliente"];
        $descricao          = $_POST["descricao"];
        $valor_hora         = $_POST["valor_hora"];

        echo $idcliente;
		echo $idclientequartos;
		echo $descricao;
		echo $valor_hora;
        
        $clientequartos = new ClienteQuartos( ""
                                            , $idcliente
                                            , $descricao
                                            , $valor_hora  );
        echo $clientequartos;

        $acoes = new ClienteQuartosDAO();
        $acoes->inserir($clientequartos);
?>