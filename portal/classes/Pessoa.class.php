<?php

// Inserção do Objeto Classe Pessoa, e empregamento dos seus atributos
/**
*
*/


class Pessoa extends Crud
{
  protected $tabela = "PESSOA";
  protected $id;
  protected $nome;
  protected $email;
  protected $ocupacao;
  protected $telefone;
  protected $usuario;
  protected $senha;
  protected $genero;
  protected $foto;
  protected $cidade_id;
  protected $estado_id;

  public function __construct(){
    // $this->ocupacao = get_class($this);
    // echo "Você instânciou um(a) " .get_class($this) ."\n";
  }

  public function insert(){
    $sqlQuery = "INSERT INTO PESSOA(
      nome, email, telefone, usuario, senha, genero, foto, cidade_id, estado_id, ocupacao
    )
    VALUES (
      :nome,:email,:telefone,:usuario,:senha,:genero,:foto,:cidade_id,:estado_id, :ocupacao
    );";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->bindParam(":nome",$this->nome, PDO::PARAM_STR, 45);
    $stmt->bindParam(":email",$this->email, PDO::PARAM_STR, 45);
    $stmt->bindParam(":usuario",$this->usuario, PDO::PARAM_STR, 45);
    $stmt->bindParam(":senha",$this->senha, PDO::PARAM_STR, 45);
    $stmt->bindParam(":telefone",$this->telefone, PDO::PARAM_STR, 45);
    $stmt->bindParam(":ocupacao",$this->ocupacao, PDO::PARAM_STR, 45);
    $stmt->bindParam(":genero",$this->genero, PDO::PARAM_STR, 1);
    $stmt->bindParam(":foto",$this->foto, PDO::PARAM_LOB);
    $stmt->bindParam(":cidade_id",$this->cidade_id, PDO::PARAM_INT);
    $stmt->bindParam(":estado_id",$this->estado_id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function readPessoaLista(){
    $sqlQuery = "SELECT
    PESSOA.id,
    PESSOA.nome,
    PESSOA.usuario,
    PESSOA.email,
    PESSOA.telefone,
    PESSOA.foto,
    CIDADE.nome AS cidade,
    ESTADO.nome AS estado,
    PESSOA.ocupacao AS ocupacao
    FROM PESSOA
    JOIN ESTADO ON PESSOA.estado_id = ESTADO.id
    JOIN CIDADE ON PESSOA.cidade_id = CIDADE.id;";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function searchPessoaPerfil($id){
    $exeptColumns = array('tabela','id', 'id_pessoa', 'senha', 'foto', 'cidade_id', 'estado_id', 'ocupacao');
    $sqlQuery = "SELECT ";
    foreach ($this->getAll() as $key => $value) {
      if(in_array($key, $exeptColumns)){
        continue;
      }else {
        $sqlQuery .= "{$this->tabela}.{$key}, ";
      }
    }
    $sqlQuery .=
    "
    CIDADE.nome AS cidade,
    ESTADO.nome AS estado
    FROM {$this->tabela}
    JOIN CIDADE ON CIDADE.id = PESSOA.cidade_id
    JOIN ESTADO ON ESTADO.id = PESSOA.estado_id
    WHERE id_pessoa = {$id};";
    echo $sqlQuery;
    // $stmt = Conexao::prepare($sqlQuery);
    // $stmt->execute();
    // return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function logarPessoa($nome, $senha){
    $sqlQuery = "SELECT * FROM PESSOA WHERE usuario = '{$nome}' AND senha = '{$senha}';";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function atualizarDados($dados, $campoIdenty){
    $this->setAll($dados);
    $this->updateAll($campoIdenty, $dados['id']);
  }


}
