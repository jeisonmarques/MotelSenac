<?php
    if(isset($_POST)){
        include "classes/Cliente_Quartos.php";
        include "dao/Cliente_QuartosDAO.php";

        $id           = $_POST["id"];
        $cliente_id   = $_POST["cliente_id"];
        $descricao    = $_POST["descricao"];
        $valor_hora   = $_POST["valor_hora"];
        
        $cliente_quartos = new Cliente_Quartos( ""
                                              , $cliente_id
                                              , $descricao
                                              , $valor_hora  );
        echo $cliente_quartos;

        $acoes = new Cliente_QuartosDAO();
        $acoes->inserir($cliente_quartos);
    }
?>