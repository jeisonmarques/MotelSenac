<?
class MySQL
{
	var $host="localhost";
	var $user="root";
	var $password="";
	var $database="trab_rec";

	var $query;
	var $link;
	var $result;

	function MySQL()
	{
	//Apenas instancia o Objeto
	}

	//Esta fun��o faz a conex�o com o Banco de Dados
	function connect()
	{
		$this->link=mysql_connect($this->host,$this->user,$this->password);
		if(!$this->link)
		{
			echo "Falha na conex�o com o Banco de Dados!<br />";
			echo "Erro: " . mysql_error();
			die();
		}
			elseif(!mysql_select_db($this->database, $this->link))
		{
			echo "O Bando de Dados solicitado n�o pode ser aberto!<br />";
			echo "Erro: " . mysql_error();
			die();
		}
	}

	//Esta fun��o executa uma Query
	function executeQuery($query)
	{
		$this->connect();
		$this->query=$query;
		if($this->result=mysql_query($this->query))
		{
			$this->disconnect(); 
			return $this->result;
		}
		else
		{
			echo "Ocorreu um erro na execu��o da SQL";
			echo "Erro :" . mysql_error();
			echo "SQL: " . $query;
			die();
			disconnect();
		}
	}

	function contalinha($query){
		$this->connect();
		$this->query=$query;
		echo $query;
		$this->result = mysql_fetch_array($this->query);


		echo $this->result[0];
		die();
		$this->disconnect(); 
		//return $this->result[0];
	}
	
	//Esta fun��o desconecta do Banco
	function disconnect()
	{
		return mysql_close($this->link);
	}
}
?>
