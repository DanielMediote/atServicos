<?php

/**
*
*/
class Prestador extends Pessoa
{
	protected $tabela = "PRESTADOR";
	protected $cpnj;
	protected $empresa;
	protected $servico;
	protected $profissao;

	public function __construct()
	{
		parent::__construct();
	}
	
}
?>
