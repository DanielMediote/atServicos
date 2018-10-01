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

  public function __construct()
  {
    // echo "Você instânciou um(a) " .get_class($this) ."\n";
  }

  public function readPessoa(){
    $sqlQuery = "SELECT PESSOA.id, PESSOA.nome, PESSOA.usuario, PESSOA.email,
    PESSOA.telefone, CIDADE.nome AS cidade, ESTADO.nome AS estado, PESSOA.ocupacao
    FROM PESSOA
    JOIN ESTADO ON PESSOA.estado_id = ESTADO.id
    JOIN CIDADE ON PESSOA.cidade_id = CIDADE.id;";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }

  public function readAll(){
    $sqlQuery = "SELECT * FROM {$this->tabela}";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateForeignKey($id){
    $sqlQuery = "CALL updateForeignKey('".$this->tabela."',".$id.", '".$this->email."');";
    // echo $sqlQuery;
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
  }

  public function getPessoaId(){
    $sqlQuery = "SELECT id FROM {$this->tabela} WHERE email = '".$this->email."'";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
  }

  public function logarPessoa($nome, $senha){
    $sqlQuery = "CALL logarPessoa('{$this->tabela}','{$nome}','{$senha}');";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

}
