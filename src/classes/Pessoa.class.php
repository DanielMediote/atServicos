<?php

// Inserção do Objeto Classe Pessoa, e empregamento dos seus atributos
/**
*
*/


class Pessoa extends Crud
{
  protected $nome;
  protected $email;
  protected $telefone;
  protected $usuario;
  protected $senha;
  protected $genero;

  public function __construct()
  {
    echo "Você instânciou um(a) " .get_class($this);
  }

  public function insert(){
    $keysArray = array_keys($this->getObjClass());
    $valueArray = array_values($this->getObjClass());
    $campos = implode(", ", array_filter($keysArray,function($res){
      return $res <> 'tabela';
    }, ARRAY_FILTER_USE_BOTH));
    $valores = implode("', '",array_filter($valueArray,function($res){
      return $res <> 0;
    }, ARRAY_FILTER_USE_KEY));
    $queryInsert = "INSERT INTO {$this->tabela}(".$campos.") VALUES('".$valores."');";
    $stmp = Conexao::prepare($queryInsert);
    $stmp->execute();
  }

  public function readAll()
  {
    $querySelect = "SELECT * FROM {$this->tabela}";
    $smtp = Conexao::prepare($querySelect);
    $smtp->execute();
    return $smtp->fetchAll();
  }

}
