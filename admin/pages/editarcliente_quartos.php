<?php
    if(isset($_POST)) {
        include "classes/Cliente_Quartos.php";	
        include "dao/Cliente_QuartosDAO.php";
        
        $id = $_POST["id"];
        $acoes = new Cliente_QuartosDAO();

        if($_POST["acao"] == "Alterar") {
            $cliente_id       = $_POST["cliente_id"];
            $descricao        = $_POST["descricao"];
            $valor_hora       = $_POST["valor_hora"];

            $cliente_quarto = new Paciente( $id
                                    , $cliente_id
                                    , $descricao
                                    , $valor_hora  );

            if($acoes->alterar($cliente_quarto)) 
                header("refresh:3; url=index.html");
        }
    }
?>