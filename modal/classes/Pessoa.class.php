<?php

// Inserção do Objeto Classe Pessoa, e empregamento dos seus atributos
/**
*
*/


class Pessoa extends Crud
{
  protected $id;
  protected $nomeCompleto;
  protected $email;
  protected $usuario;
  protected $telefone;
  protected $senha;
  protected $genero;
  protected $pathFile;

  public function __construct()
  {
    echo "Você instânciou um(a) " .get_class($this) ."<br>";
  }

  public function readAll()
  {
    $querySelect = "SELECT * FROM {$this->tabela}";
    $smtp = Conexao::prepare($querySelect);
    $smtp->execute();
    return $smtp->fetchAll();
  }

}
