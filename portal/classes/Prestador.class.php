<?php

/**
*
*/
class Prestador extends Pessoa
{
	protected $tabela = "PRESTADOR";
	protected $id;
	protected $id_pessoa;
	protected $cpnj;
	protected $id_servico;

	public function __construct()
	{
		parent::__construct();
	}

}
?>
