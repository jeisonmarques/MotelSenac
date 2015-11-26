<?php

class ClienteQuartos {

    protected $idclientequartos;
    protected $idcliente;
    protected $descricao;
    protected $valor_hora;

    function __construct( $idclientequartos = ""
                        , $idcliente        = ""
                        , $descricao        = ""
                        , $valor_hora       = "" ) {
        $this->idclientequartos     = $idclientequartos;
        $this->idcliente            = $idcliente;
        $this->descricao            = $descricao;
        $this->valor_hora           = $valor_hora;
    }

    function &__set($prop, $val) {
        $this->$prop = $val;
    }

    function &__get($prop) {
        return $this->$prop;
    }

    function __toString() {
        return "O quarto de id [".$this->idclientequartos."] tem a descrição ".$this->descricao;
    }
}
?>