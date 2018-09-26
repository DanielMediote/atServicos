<?php


class Servico extends Crud
{
    protected $tabela = "SERVICO";
    protected $id;
    protected $ser_Nome;
    protected $categoria_Servico_id;
    protected $ser_Custo;
    protected $ser_Descricao;
    protected $prestador_id;


    public function __construct()
    {
    }

}
