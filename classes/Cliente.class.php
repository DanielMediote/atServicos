<?php


/**
*
*/
class Cliente extends Pessoa
{
	protected $tabela = "CLIENTE";
	protected $cpf;
	protected $dataNasc;

	public function __construct()
	{
		parent::__construct();
	}

}







?>
