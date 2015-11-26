<?php
include "dao/BancoPDO.php";

class ClienteQuartosDAO extends BancoPDO {

    public function __construct() {
        $this->conexao = BancoPDO::conexao();
    }

    public function inserir($ClienteQuartos) {
        try { 
            $stm = $this->conexao->prepare(" INSERT INTO ClienteQuartos (cliente_id, descricao, valor_hora) "
                                          ." VALUES (?, ?, ?) ");
            $stm->bindValue(1, $ClienteQuartos->cliente_id);
            $stm->bindValue(2, $ClienteQuartos->descricao);
            $stm->bindValue(3, $ClienteQuartos->valor_hora);

           
            if($stm->execute()) {
                echo "Dados inseridos com sucesso! <br/>";
                header("Location: index.html");
            }
        } catch(PDOException $e) {
                echo "Erro: ".$e->getMessage();
        }
    }

    public function visualizar($id = "") {
        try { 
            if($id == "") {
                $stm = $this->conexao->prepare("SELECT * FROM ClienteQuartos");
            } else {
                $stm = $this->conexao->prepare("SELECT * FROM ClienteQuartos WHERE id = ?");
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
    
    public function buscarDados($id) {
        try {
            $stm = $this->conexao->prepare("SELECT * FROM ClienteQuartos WHERE id = ?");
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
    
    public function alterar($ClienteQuartos) {
        try {
            $stm = $this->conexao->prepare("UPDATE ClienteQuartos SET cliente_id = ? "
                                          .", descricao = ?, valor_hora = ? "
                                          ." WHERE id = ? ");
            $stm->bindValue(1, $ClienteQuartos->cliente_id);
            $stm->bindValue(2, $ClienteQuartos->descricao);
            $stm->bindValue(3, $ClienteQuartos->valor_hora);

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

}
?>