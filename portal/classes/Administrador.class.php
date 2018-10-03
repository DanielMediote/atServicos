<?php

class Administrador extends Pessoa
{

  protected $tabela = "ADMIN";

  function __construct(){
    parent::__construct();
  }

  public function readAll(){

  }

  public function cadastrarPrestador($dadosPrestador, $pessoa, $prestador){
    $pessoa->setAll($dadosPrestador);
    $pessoa->insert();
    // $pessoa->getDetalhes();
    $id_pessoa = $pessoa->getPessoaId();
    $prestador->setAll($dadosPrestador);
    $prestador->insert();
    // $prestador->getDetalhes();
    $prestador->updateForeignKey($id_pessoa);
    $pessoa->updateOne('ocupacao', get_class($prestador));
  }

}


 ?>
