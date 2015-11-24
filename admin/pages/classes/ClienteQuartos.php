<?php

class ClienteQuartos {

    protected $IdClienteQuartos;
    protected $IdCliente;
    protected $descricao;
    protected $valor_hora;

    function __construct( $IdClienteQuartos = ""
                        , $IdCliente        = ""
                        , $descricao        = ""
                        , $valor_hora       = "" ) {
        $this->IdClienteQuartos     = $IdClienteQuartos;
        $this->IdCliente            = $IdCliente;
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
        return "O quarto de id [".$this->IdClienteQuartos."] tem a descrição ".$this->descricao;
    }
}
?>