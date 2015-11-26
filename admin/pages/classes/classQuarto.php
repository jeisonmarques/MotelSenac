<?
require_once("classes/classConexaoMysql.php");

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
        $mySQL = new MySQL;
        $rs = $mySQL->executeQuery("SELECT * FROM cliente_quartos;");
        $mySQL->disconnect;
        return $rs;
    }
    
    //SELECT ID
    function selecionaid(){
        $mySQL = new MySQL;
        $rs = $mySQL->executeQuery("SELECT * FROM cliente_quartos where id='$this->id';");
        $mySQL->disconnect;
        return $rs;
    }
    
        //DELETE
        function apaga(){
        $mySQL = new MySQL;
        $rs = $mySQL->executeQuery("delete from cliente_quartos where id = '$this->id'");
        $mySQL->disconnect;
        return $rs;
        }
    
    // INSERT
    function inseri(){
        $mySQL = new MySQL;
        $sql = "INSERT INTO cliente_quartos (id, cliente_id, descricao, valor_hora ) 
                VALUES (NULL, '$this->cliente_id', '$this->descricao', '$this->valor_hora')";
        $rs = $mySQL->executeQuery($sql);
        $mySQL->disconnect;
        return $rs;     
    }
    
    //UPDATE
    function atualiza(){
        $mySQL = new MySQL;
        $sql = "update cliente_quartos,senha set senha = '$this->novasenha', senha = '$this->novasenha' where id = '$this->id'";
        $rs = $mySQL->executeQuery($sql);       
        $mySQL->disconnect;
        return $rs;
    }   

    // PESQUISAR
    function pesquisa(){
        $mySQL = new MySQL;
        $sql = "select nome, senha from cliente_quartos where nome = '$this->nome' and senha = '$this->senha'";     
        $rs = $mySQL->executeQuery($sql);
        $mySQL->disconnect;
        return $rs;
    }

    // LOGAR
    function loga(){
        $mySQL = new MySQL;     
        $sql = "select email, senha from cliente_quartos where email = '$this->email' and senha = '$this->senha'";  
        //echo $sql;
        $rs = $mySQL->executeQuery($sql);       
        $mySQL->disconnect;
        return $rs;
    }
    
    // CONTAR
    function contar(){
        $mySQL = new MySQL;
        $sql = "SELECT * FROM cliente_quartos";
        $rs = $mySQL->contalinha($sql);
        //echo $sql;
        $mySQL->disconnect;
        return $rs;
    }
}
?>