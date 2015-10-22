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
		public function __set($name,$value) {
			switch($name) { //this is kind of silly example, bt shows the idea
			case 'id': 
			return $this->setid($value);
			case 'nome': 
			return $this->setnome($value);			
			}
		}
		private $novapergunta;
		public function setnovapergunta($novapergunta) {
			$this->novapergunta= $novapergunta;
		}
		public function getnovapergunta() {
			return $this->novapergunta;
		}

		public function __get($name) {
		switch($name) {
			case 'id': 
			return $this->getid();
			case 'nome': 
			return $this->getnome();						
		}
	}
		//METODOS DE BANCO
		//SELECT
		function seleciona(){
		$mySQL = new MySQL;
		$rs = $mySQL->executeQuery("SELECT * FROM pergunta");
		$mySQL->disconnect;
		return $rs;
		}

		//DELETE
		function apaga(){
  		$mySQL = new MySQL;
		$rs = $mySQL->executeQuery("delete from pergunta where id = '$this->id'");
		$mySQL->disconnect;		
		return $rs;
		}

		// INSERT
		function inseri(){
		   $mySQL = new MySQL;
		$sql = "Insert into pergunta (nome) values ('$this->nome')";
		echo $sql;
		$rs = $mySQL->executeQuery($sql);
		$mySQL->disconnect;
		return $rs;
		}

		//UPDATE
		function atualiza(){
		$mySQL = new MySQL;
		$sql = "update pergunta set nome = '$this->novapergunta' where id = '$this->id'";
		$rs = $mySQL->executeQuery($sql);
		$mySQL->disconnect;
		return $rs;
		}

		// PESQUISAR
		function pesquisar(){
		$mySQL = new MySQL;
		$sql = "SELECT p.nome AS pNome,
		r.nome AS rNome
		FROM pergunta AS p
		INNER JOIN resposta AS r
		ON p.id = r.idpergunta
		WHERE p.nome like '%$this->nome%'";

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

		// CONTAR
		function contar(){
			$mySQL = new MySQL;
			$sql = "SELECT * FROM pergunta";
			$rs = $mySQL->contalinha($sql);
			//echo $sql;
			$mySQL->disconnect;
			return $rs;
		}
	}
?>