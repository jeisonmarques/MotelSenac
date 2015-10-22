<?
	require_once("classConexaoMysql.php");

	Class cliente
	{
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
		private $longitude;
		public function setlongitude($longitude) {
			$this->longitude= $longitude;
		}
		public function getlongitude() {
			return $this->longitude;
		}
		private $latitude;
		public function setlatitude($latitude) {
			$this->latitude= $latitude;
		}
		public function getlatitude() {
			return $this->latitude;
		}
		private $senha;
		public function setsenha($senha) {
			$this->senha= $senha;
		}
		public function getsenha() {
			return $this->senha;
		}
		public function __set($name,$value) {
			switch($name) { //this is kind of silly example, bt shows the idea
			case 'id': 
			return $this->setid($value);
			case 'nome': 
			return $this->setnome($value);			
			}
		}
		private $email;
		public function setemail($email) {
			$this->email= $email;
		}
		public function getemail() {
			return $this->email;
		}
		private $cep;
		public function setcep($cep) {
			$this->cep= $cep;
		}
		public function getcep() {
			return $this->cep;
		}
		
		private $rua;
		public function setrua($rua) {
			$this->rua= $rua;
		}
		public function getrua() {
			return $this->rua;
		}
		private $numero;
		public function setnumero($numero) {
			$this->numero= $numero;
		}
		public function getnumero() {
			return $this->numero;
		}
		private $bairro;
		public function setbairro($bairro) {
			$this->bairro= $bairro;
		}
		public function getbairro() {
			return $this->bairro;
		}
		private $cidade;
		public function setcidade($cidade) {
			$this->cidade= $cidade;
		}
		public function getcidade() {
			return $this->cidade;
		}
		private $cidade;
		public function setcidade($cidade) {
			$this->cidade= $cidade;
		}
		public function getcidade() {
			return $this->cidade;
		}
		private $novoCliente;
		public function setnovoCliente($novoCliente) {
			$this->novoCliente= $novoCliente;
		}
		public function getnovoCliente() {
			return $this->novoCliente;
		}

		public function __get($name) {
		switch($name) {
			case 'id': 
			return $this->getid();
			case 'nome': 
			return $this->getnome();
			case 'cnpj': 
			return $this->getcnpj();	
			case 'latidude': 
			return $this->getlatidude();	
			case 'longitude': 
			return $this->getlongitude();	
			case 'email': 
			return $this->getemail();	
			case 'senha': 
			return $this->getsenha();	
			case 'cep': 
			return $this->getcep();	
			case 'rua': 
			return $this->getrua();
			case 'numero': 
			return $this->getnumero();
			case 'bairro': 
			return $this->getbairro();
			case 'cidade': 
			return $this->getcidade();			
			case 'estado': 
			return $this->getestado();
		}
	}
		//METODOS DE BANCO
		//SELECT
		function selecionar(){
		$mySQL = new MySQL;
		$rs = $mySQL->executeQuery("SELECT * FROM pergunta");
		$mySQL->disconnect;
		return $rs;
		}
		
		// INSERT
		function inserir(){
		   $mySQL = new MySQL;
		$sql = "Insert into pergunta (nome,cnpj,latidude,longitude,email,senha,cep,rua,numero,bairro,cidade,estado)  
				values ('$this->nome','$this->cnpj','$this->latidude','$this->longitude','$this->email','$this->senha','$this->cep','$this->rua','$this->numero','$this->bairro','$this->cidade','$this->estado')";
		echo $sql;
		$rs = $mySQL->executeQuery($sql);
		$mySQL->disconnect;
		return $rs;
		}

		//UPDATE
		function atualizar(){
		$mySQL = new MySQL;
		$sql = "update pergunta set (nome,cnpj,latidude,longitude,email,senha,cep,rua,numero,bairro,cidade,estado)
		        = '$this->novoCliente' where id = ('$this->nome','$this->cnpj','$this->latidude','$this->longitude','$this->email','$this->senha','$this->cep','$this->rua','$this->numero','$this->bairro','$this->cidade','$this->estado')";
		$rs = $mySQL->executeQuery($sql);
		$mySQL->disconnect;
		return $rs;
		}

		// PESQUISAR
		function pesquisar(){
		$mySQL = new MySQL;
		$sql = "";
		$rs = $mySQL->executeQuery($sql);
		$mySQL->disconnect;
		return $rs;

		$cont = 0;
		$numResult = 0;
		$linha = 0;

		$numResult = mysql_num_rows( $rs );// mysql_num_rows() retorna a quantidade de linhas que foram retornadas	

	}
		// PESQUISAR
		function pesquisa(){
		$mySQL = new MySQL;
		$sql = "SELECT p.nome AS pNome, r.nome AS rNome FROM pergunta AS p INNER JOIN resposta AS r ON p.id = r.idpergunta WHERE p.nome like '%$this->nome%'";
		$rs = $mySQL->executeQuery($sql);
		$mySQL->disconnect;
		return $rs;
		}		
		
		// LOGAR
		function logar(){
			$mySQL = new MySQL;
			$sql = "select nome, senha from usuario where nome = '$this->nome' and senha = '$this->senha'";		
			$rs = $mySQL->executeQuery($sql);
			//echo $sql;
			$mySQL->disconnect;
			return $rs;
		}

	}
?>