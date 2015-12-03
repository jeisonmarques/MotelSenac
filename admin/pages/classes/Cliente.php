<?php

class Cliente {

    protected $id;
    protected $nome;
    protected $cnpj;
    protected $end_logradouro;
    protected $end_numero;
    protected $end_bairro;
    protected $end_cidade;    
    protected $end_cep;
    protected $latitude;
    protected $longitude;
    protected $email;
    protected $senha;
    protected $ativo;
    protected $foto;
    protected $descricao;

    function __construct( $id               = ""
                        , $nome             = ""
                        , $cnpj             = ""
                        , $end_logradouro   = ""
                        , $end_numero       = ""
                        , $end_bairro       = ""
                        , $end_cidade       = ""                        
                        , $end_cep          = ""
                        , $latitude         = ""
                        , $longitude        = ""
                        , $email            = ""
                        , $senha            = ""
                        , $ativo            = ""
                        , $foto             = ""
                        , $descricao        = "") {
            $this->id               = $id;
            $this->nome             = $nome;
            $this->cnpj             = $cnpj;
            $this->end_logradouro   = $end_logradouro;
            $this->end_numero       = $end_numero;
            $this->end_bairro       = $end_bairro;
            $this->end_cidade       = $end_cidade;            
            $this->end_cep          = $end_cep;
            $this->latitude         = $latitude;
            $this->longitude        = $longitude;
            $this->email            = $email;
            $this->senha            = $senha;
            $this->ativo            = $ativo;
            $this->foto             = $foto;
            $this->descricao        = $descricao;
    }

    function &__set($prop, $val) {
        $this->$prop = $val;
    }

    function &__get($prop) {
        return $this->$prop;
    }

    function __toString() {
        return "O Cliente de id [".$this->id."] tem o nome ".$this->nome;
    }
}
?>