<?php


class Servico extends Crud
{
    protected $tabela = "SERVICO";
    protected $id;
    protected $nomeServico;
    protected $tipoServico;
    protected $custoServico;
    protected $descricaoServico;

    public function __construct()
    {
    }

}
