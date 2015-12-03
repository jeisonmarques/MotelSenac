<?php
class BancoPDO {
    public $tipo = "sqlsrv";
    public $host = "tcp:v8xjjhajlw.database.windows.net,1433";
    public $usuario = "apl@v8xjjhajlw";
    public $senha = "Sjm157304@";
    public $banco = "motelAtVQaSrngqJ";
    public $con = null;

    public function conexao() {
        try {
            $this->con = new PDO( $this->tipo.":server=".$this->host.";Database=".$this->banco
                                , $this->usuario
                                , $this->senha );
            
            $this->con->setAttribute( PDO::ATTR_ERRMODE
                                    , PDO::ERRMODE_EXCEPTION);
            
            return $this->con; 
        } catch(PDOException $e) {
            echo "Erro: ".$e->getMessage();
            echo $con->erroInfo();
        }
    }
}
?>