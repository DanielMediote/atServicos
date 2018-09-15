<?php

/**
 *
 */
class Servico extends Crud
{
    protected $tabela = "SERVICO";
    protected $nomeServico;
    protected $tipoServico;
    protected $custoServico;
    protected $descricaoServico;

    public function __construct()
    {
    }

    public function insert()
    {
      # code...
    }


    public function readAll()
    {
      $querySelect = "SELECT * FROM {$this->tabela}";
      $smtp = Conexao::prepare($querySelect);
      $smtp->execute();
      return $smtp->fetchAll();
    }

}
