<?php

/**
*
*/
class Prestador extends Pessoa
{
	protected $tabela = "PRESTADOR";
	protected $id;
	protected $id_pessoa;
	protected $pre_cpnj;

	public function __construct()
	{
		parent::__construct();
	}

}
?>
