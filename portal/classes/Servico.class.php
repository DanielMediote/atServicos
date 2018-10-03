<?php


class Servico extends Crud
{
    protected $tabela = "SERVICO";
    protected $id;
    protected $nome;
    protected $categoria;
    protected $custo;
    protected $descricao;

    public function __construct(){
    }

}
