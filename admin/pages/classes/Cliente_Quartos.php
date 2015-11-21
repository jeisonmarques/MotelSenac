<?php

class Cliente_Quartos {

    protected $id;
    protected $cliente_id;
    protected $descricao;
    protected $valor_hora;

    function __construct( $id             = ""
                        , $cliente_id     = ""
                        , $descricao      = ""
                        , $valor_hora     = "" ) {
        $this->id             = $id;
        $this->cliente_id     = $cliente_id;
        $this->descricao      = $descricao;
        $this->valor_hora     = $valor_hora;
    }

    function &__set($prop, $val) {
        $this->$prop = $val;
    }

    function &__get($prop) {
        return $this->$prop;
    }

    function __toString() {
        return "O quarto de id [".$this->id."] tem a descrição ".$this->descricao;
    }
}
?>