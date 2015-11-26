<?
require_once("dao/BancoPDO.php");

Class quartos{

    private $id;
    public function setid($id) {
      $this->id= $id;
    }
    public function getid() {
      return $this->id;
    }
    private $cliente_id;
    public function setcliente_id($cliente_id) {
      $this->cliente_id= $cliente_id;
    }
    public function getcliente_id() {
      return $this->cliente_id;
    }    
    private $descricao;
    public function setdescricao($descricao) {
      $this->descricao= $descricao;
    }
    public function getdescricao() {
      return $this->descricao;
    }  
    private $valor_hora;
    public function setvalor_hora($valor_hora) {
      $this->valor_hora= $valor_hora;
    }
    public function getvalor_hora() {
      return $this->valor_hora;
    }  

    //METODOS DE BANCO
    //SELECT
    function seleciona(){
        $mySQL = new BancoPDO;
        $rs = $mySQL->executeQuery("SELECT * FROM clientequartos;");
        $mySQL->disconnect;
        return $rs;
    }
    
    //SELECT ID
    function selecionaid(){
        $mySQL = new BancoPDO;
        $rs = $mySQL->executeQuery("SELECT * FROM clientequartos where idclientequartos='$this->id';");
        $mySQL->disconnect;
        return $rs;
    }
    
        //DELETE
        function apaga(){
        $mySQL = new BancoPDO;
        $rs = $mySQL->executeQuery("delete from clientequartos where idclientequartos = '$this->id'");
        $mySQL->disconnect;
        return $rs;
        }
    
    // INSERT
    function inseri(){
        $mySQL = new BancoPDO;
        $sql = "INSERT INTO clientequartos (idclientequartos, idcliente, descricao, valor_hora ) 
                VALUES (NULL, '$this->cliente_id', '$this->descricao', '$this->valor_hora')";
        $rs = $mySQL->executeQuery($sql);
        $mySQL->disconnect;
        return $rs;     
    }
    
    //UPDATE
    function atualiza(){
        $mySQL = new BancoPDO;
        $sql = "update clientequartos,senha set senha = '$this->novasenha', senha = '$this->novasenha' where idclientequartos = '$this->id'";
        $rs = $mySQL->executeQuery($sql);       
        $mySQL->disconnect;
        return $rs;
    }   
    
    // CONTAR
    function contar(){
        $mySQL = new BancoPDO;
        $sql = "SELECT * FROM clientequartos";
        $rs = $mySQL->contalinha($sql);
        //echo $sql;
        $mySQL->disconnect;
        return $rs;
    }
}
?>