<?php
include "BancoPDO.php";

class Cliente_QuartosDAO extends BancoPDO {

    public function __construct() {
        echo "funcionou isso aqui?";
        $this->conexao = BancoPDO::conexao();
    }
    /*

    public function inserir($cliente_quartos) {
        try { 
            $stm = $this->conexao->prepare(" INSERT INTO cliente_quartos (cliente_id, descricao, valor_hora) "
                                          ." VALUES (?, ?, ?) ");
            $stm->bindValue(1, $cliente_quartos->cliente_id);
            $stm->bindValue(2, $cliente_quartos->descricao);
            $stm->bindValue(3, $cliente_quartos->valor_hora);

           
            if($stm->execute()) {
                echo "Dados inseridos com sucesso! <br/>";
                header("Location: index.html");
            }
        } catch(PDOException $e) {
                echo "Erro: ".$e->getMessage();
        }
    }
*/
    /*
    public function visualizar($id = "") {
        try { 
            if($id == "") {
                $stm = $this->conexao->prepare("SELECT * FROM cliente_quartos");
            } else {
                $stm = $this->conexao->prepare("SELECT * FROM cliente_quartos WHERE id = ?");
                $stm->bindParam(1, $id, PDO::PARAM_INT);
            }

            if($stm->execute()) {
                $tabela = "<table class="table table-striped table-bordered table-hover" id="dataTables-example"><tr>"
                         ."<td>ID</td>"
                         ."<td>CLIENTE_ID</td>"
                         ."<td>DESCRICAO</td>"
                         ."<td>VALOR_HORA</td>"
                         ."</tr>";
                while($dados = $stm->fetch(PDO::FETCH_OBJ)) {
                   $tabela .= "<tr>"
                             ."<td>".$dados->id."</td>"
                             ."<td>".$dados->cliente_id."</td>"
                             ."<td>".$dados->descricao."</td>"
                             ."<td>".$dados->valor_hora."</td>"
                             ."</tr>"; 
                }
                $tabela .= "</table>";
                echo $tabela;
            }
        } catch(PDOException $e) {
                echo "Erro: ".$e->getMessage();
        }
    }
 */   
  /*  
    public function buscarDados($id) {
        try {
            $stm = $this->conexao->prepare("SELECT * FROM cliente_quartos WHERE id = ?");
            $stm->bindValue(1, $id);

            $query = $stm->execute();

            if($query) {
                $dados = $stm->fetch(PDO::FETCH_OBJ);
                return $dados;                  
            }
        } catch (PDOException $e) {
            echo "Erro: ".$e->getMessage();
        }
    }
    
    public function alterar($cliente_quartos) {
        try {
            $stm = $this->conexao->prepare("UPDATE cliente_quartos SET cliente_id = ? "
                                          .", descricao = ?, valor_hora = ? "
                                          ." WHERE id = ? ");
            $stm->bindValue(1, $cliente_quartos->cliente_id);
            $stm->bindValue(2, $cliente_quartos->descricao);
            $stm->bindValue(3, $cliente_quartos->valor_hora);

            $query = $stm->execute();

            if($query) {
                echo "Dados atualizados com sucesso";
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro: ".$e->getMessage();
        }
    }
*/
}
?>