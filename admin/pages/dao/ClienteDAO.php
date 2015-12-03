<?php
include "dao/BancoPDO.php";

class ClienteDAO extends BancoPDO {

    public function __construct() {
        $this->conexao = BancoPDO::conexao();
    }

    public function inserir($cliente) {
        try { 
            $stm = $this->conexao->prepare(" INSERT INTO cliente (nome, cnpj, end_logradouro, end_numero, end_bairro, end_cidade, end_cep, latidade, longitude, email, senha, ativo, foto, descricao) "
                                          ." VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'S', ?, ?) ");
            $stm->bindValue(1, $cliente->nome);
            $stm->bindValue(2, $cliente->cnpj);
            $stm->bindValue(3, $cliente->end_logradouro);
            $stm->bindValue(4, $cliente->end_numero);
            $stm->bindValue(5, $cliente->end_bairro);
            $stm->bindValue(6, $cliente->end_cidade);
            $stm->bindValue(7, $cliente->end_cep);
            $stm->bindValue(8, $cliente->latidade);
            $stm->bindValue(9, $cliente->longitude);
            $stm->bindValue(10, $cliente->email);
            $stm->bindValue(11, $cliente->senha);
            $stm->bindValue(12, $cliente->ativo);
            $stm->bindValue(13, $cliente->foto);
            $stm->bindValue(14, $cliente->descricao);
           
            if($stm->execute()) {
                echo "Dados inseridos com sucesso! <br/>";
                header("Location: cadCliente.html");
            }
        } catch(PDOException $e) {
                echo "Erro: ".$e->getMessage();
        }
    }

    public function visualizar($id = "") {
        try { 
            if($id == "") {
                $stm = $this->conexao->prepare("SELECT * FROM cliente");
            } else {
                $stm = $this->conexao->prepare("SELECT * FROM cliente WHERE id = ?");
                $stm->bindParam(1, $id, PDO::PARAM_INT);
            }

            if($stm->execute()) {
                $tabela = "<table class="table table-striped table-bordered table-hover" id="dataTables-example"><tr>"
                        ."<td>nome</td>"
                        ."<td>cnpj</td>"
                        ."<td>end_logradouro</td>"
                        ."<td>end_numero</td>"
                        ."<td>end_bairro</td>"
                        ."<td>end_cidade</td>"
                        ."<td>end_cep</td>"
                        ."<td>latidade</td>"
                        ."<td>longitude</td>"
                        ."<td>email</td>"
                        ."<td>senha</td>"
                        ."<td>ativo</td>"
                        ."<td>foto</td>"
                        ."<td>descricao</td>"
                        ."</tr>";
                while($dados = $stm->fetch(PDO::FETCH_OBJ)) {
                   $tabela .= "<tr>"
                                ."<td>".$dados->nome."</td>"
                                ."<td>".$dados->cnpj."</td>"
                                ."<td>".$dados->end_logradouro."</td>"
                                ."<td>".$dados->end_numero."</td>"
                                ."<td>".$dados->end_bairro."</td>"
                                ."<td>".$dados->end_cidade."</td>"
                                ."<td>".$dados->end_cep."</td>"
                                ."<td>".$dados->latidade."</td>"
                                ."<td>".$dados->longitude."</td>"
                                ."<td>".$dados->email."</td>"
                                ."<td>".$dados->senha."</td>"
                                ."<td>".$dados->ativo."</td>"
                                ."<td>".$dados->foto."</td>"
                                ."<td>".$dados->descricao."</td>"
                             ."<td><a href='cadCliente.html?acao=editar&id=".$dados->id."'>Editar</a></td>"
                             ."</tr>"; 
                }
                $tabela .= "</table>";
                echo $tabela;
            }
        } catch(PDOException $e) {
                echo "Erro: ".$e->getMessage();
        }
    }
    
    public function autenticar($cliente) {
        try { 
            $stm = $this->conexao->prepare(" SELECT nome FROM cliente " 
                                          ."  where upper(email) = upper(?) "
                                          ."    and upper(senha) = upper(?) "
                                          ."    and ativo = 'S' ");
            $stm->bindValue(1, $cliente->email);
            $stm->bindValue(2, $cliente->senha);

            if($stm->execute()) {
                $dados = $stm->fetch(PDO::FETCH_OBJ);
            }
            return $dados;
        } catch(PDOException $e) {
            echo "Erro: ".$e->getMessage();
        }
    }

    public function buscarDados($id) {
        try {
            $stm = $this->conexao->prepare("SELECT * FROM cliente WHERE id = ?");
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
    
    public function alterar($cliente) {
        try {
                $stm = $this->conexao->prepare("UPDATE cliente SET nome = ? ,cnpj = ? ,end_logradouro = ? ,end_numero = ? ,end_bairro = ? ,end_cidade = ? ,end_cep = ? ,latidade = ? ,longitude = ? ,email = ? ,senha = ? ,ativo = ? ,foto= ?  ,descricao = ?"
                                              ." WHERE id = ? ");
                $stm->bindValue(1, $cliente->nome);
                $stm->bindValue(2, $cliente->cnpj);
                $stm->bindValue(3, $cliente->end_logradouro);
                $stm->bindValue(4, $cliente->end_numero);
                $stm->bindValue(5, $cliente->end_bairro);
                $stm->bindValue(6, $cliente->end_cidade);
                $stm->bindValue(7, $cliente->end_cep);
                $stm->bindValue(8, $cliente->latidade);
                $stm->bindValue(9, $cliente->longitude);
                $stm->bindValue(10, $cliente->email);
                $stm->bindValue(11, $cliente->senha);
                $stm->bindValue(12, $cliente->ativo);
                $stm->bindValue(13, $cliente->foto);
                $stm->bindValue(14, $cliente->descricao);

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

    public function inativar($id) {
        try {
            $stm = $this->conexao->prepare("Update cliente set ativo = 'N' WHERE id = ?");
            $stm->bindValue(1, $id);

            $query = $stm->execute();

            if($query) {
                echo "cliente inativado com sucesso";
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