<?php
    if(isset($_POST)){
        include "classes/Cliente.php";
        include "dao/ClienteDAO.php";

        $id = $_POST["id"];;
        $nome = $_POST["nome"];
        $cnpj = $_POST["cnpj"];
        $end_logradouro = $_POST["end_logradouro"];
        $end_numero = $_POST["end_numero"];
        $end_bairro = $_POST["end_bairro"];
        $end_cidade = $_POST["end_cidade"];  
        $end_cep = $_POST["end_cep"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $ativo = $_POST["ativo"];
        $foto = $_POST["foto"];
        $descricao = $_POST["descricao"];
        
        $Cliente = new Cliente( ""
                                    , $id               
                                    , $nome             
                                    , $cnpj             
                                    , $end_logradouro   
                                    , $end_numero       
                                    , $end_bairro       
                                    , $end_cidade                               
                                    , $end_cep          
                                    , $latitude         
                                    , $longitude        
                                    , $email            
                                    , $senha            
                                    , $ativo            
                                    , $foto             
                                    , $descricao );
        echo $Cliente;

        $acoes = new ClienteDAO();
        $acoes->inserir($Cliente);
    }
?>