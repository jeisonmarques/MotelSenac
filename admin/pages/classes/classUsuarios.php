<?
require_once("dao/BancoPDO.php");

Class usuarios{

	private $id;
	public function setid($id) {
	  $this->id= $id;
	}
	public function getid() {
	  return $this->id;
	}
	private $nome;
	public function setnome($nome) {
	  $this->nome= $nome;
	}
	public function getnome() {
	  return $this->nome;
	}
	private $cnpj;
	public function setcnpj($cnpj) {
	  $this->cnpj= $cnpj;
	}
	public function getcnpj() {
	  return $this->cnpj;
	}
	private $end_logradouro;
	public function setend_logradouro($end_logradouro) {
	  $this->end_logradouro= $end_logradouro;
	}
	public function getend_logradouro() {
	  return $this->end_logradouro;
	}
		private $end_numero;
	public function setend_numero($end_numero) {
	  $this->end_numero= $end_numero;
	}
	public function getend_numero() {
	  return $this->end_numero;
	}
	private $end_bairro;
	public function setend_bairro($end_bairro) {
	  $this->end_bairro= $end_bairro;
	}
	public function getend_bairro() {
	  return $this->end_bairro;
	}
	private $end_cidade;
	public function setend_cidade($end_cidade) {
	  $this->end_cidade= $end_cidade;
	}
	public function getend_cidade() {
	  return $this->end_cidade;
	}
	private $end_cep;
	public function setend_cep($end_cep) {
	  $this->end_cep= $end_cep;
	}
	public function getend_cep() {
	  return $this->end_cep;
	}
	private $latitude;
	public function setlatitude($latitude) {
	  $this->latitude= $latitude;
	}
	public function getlatitude() {
	  return $this->latitude;
	}
	private $longitude;
	public function setlongitude($longitude) {
	  $this->longitude= $longitude;
	}
	public function getlongitude() {
	  return $this->longitude;
	}
	private $email;
	public function setemail($email) {
	  $this->email= $email;
	}
	public function getemail() {
	  return $this->email;
	}			
	private $senha;
	public function setsenha($senha) {
	  $this->senha= $senha;
	}
	public function getsenha() {
	  return $this->senha;
	}	
	private $ativo;
	public function setativo($ativo) {
	  $this->ativo= $ativo;
	}
	public function getativo() {
	  return $this->ativo;
	}	
	private $foto;
	public function setfoto($foto) {
	  $this->foto= $foto;
	}
	public function getfoto() {
	  return $this->foto;
	}	
	private $descricao;
	public function setdescricao($descricao) {
	  $this->descricao= $descricao;
	}
	public function getdescricao() {
	  return $this->descricao;
	}
	private $banheira;
	public function setbanheira($banheira) {
	  $this->banheira= $banheira;
	}
	public function getbanheira() {
	  return $this->banheira;
	}				


	public function getnovasenha() {
	  return $this->novasenha;
	}
	public function __set($name,$value) {
		switch($name) { //this is kind of silly example, bt shows the idea
			case 'id': 
				return $this->setid($value);
			case 'nome': 
				return $this->setnome($value);
			case 'novasenha': 
				return $this->getnovasenha();		
		}
	}

	public function __get($name) 
	{
		switch($name) {
			case 'id': 
				return $this->getid();
			case 'nome': 
				return $this->getnome();			
			case 'senha': 
				return $this->getsenha();
			case 'novasenha': 
				return $this->getnovasenha();
		}
	}

	//METODOS DE BANCO
	//SELECT
    function seleciona(){
		$mySQL = new MySQL;
		$rs = $mySQL->executeQuery("SELECT * FROM cliente;");
		$mySQL->disconnect;
		return $rs;
    }
	
	//SELECT ID
    function selecionaid(){
        $mySQL = new MySQL;
		$rs = $mySQL->executeQuery("SELECT * FROM cliente where idcliente='$this->id';");
		$mySQL->disconnect;
		return $rs;
    }
	
		//DELETE
		function apaga(){
  		$mySQL = new MySQL;
		$rs = $mySQL->executeQuery("delete from cliente where idcliente = '$this->id'");
		$mySQL->disconnect;
		return $rs;
		}
	
	// INSERT
	function inseri(){
        $mySQL = new MySQL;
		$sql = "INSERT INTO cliente (idcliente, nome, cnpj, end_logradouro, end_numero, end_bairro, end_cidade, end_cep, latitude, longitude, email, senha, ativo) 
				VALUES (NULL, '$this->nome', '$this->cnpj', '$this->end_logradouro', '$this->end_numero', '$this->end_bairro', '$this->end_cidade', '$this->end_cep', '$this->latitude', '$this->longitude', '$this->email', '$this->senha', 'S')";
		//$sql2 = "INSERT INTO cliente_quartos (id, caracteristica_id, cliente_id) VALUES (NULL, '$this->setbanheira', '$this->cliente_id')";	
		$rs = $mySQL->executeQuery($sql);
		$mySQL->disconnect;
		return $rs;		
    }
	
	//UPDATE
    function atualiza(){
        $mySQL = new MySQL;
		$sql = "update cliente, senha set senha = '$this->novasenha', senha = '$this->novasenha' where idcliente = '$this->id'";
		$rs = $mySQL->executeQuery($sql);		
		$mySQL->disconnect;
		return $rs;
    }	

    // PESQUISAR
	function pesquisa(){
	    $mySQL = new MySQL;
		$sql = "select nome, senha from usuario where nome = '$this->nome' and senha = '$this->senha'";		
		$rs = $mySQL->executeQuery($sql);
		$mySQL->disconnect;
		return $rs;
    }

	// LOGAR
	function loga(){
	    $mySQL = new MySQL;	    
		$sql = "select email, senha from usuario where email = '$this->email' and senha = '$this->senha'";	
		//echo $sql;
		$rs = $mySQL->executeQuery($sql);		
		$mySQL->disconnect;
		return $rs;
    }
	
	// CONTAR
	function contar(){
	    $mySQL = new MySQL;
		$sql = "SELECT * FROM usuario";
		$rs = $mySQL->contalinha($sql);
		//echo $sql;
		$mySQL->disconnect;
		return $rs;
	}
}
?>