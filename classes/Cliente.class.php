<?php

class Cliente extends Pessoa
{
	protected $tabela = "CLIENTE";
	protected $id;
	protected $cliente_cpf;
	protected $id_pessoa;

	public function __construct()
	{
		parent::__construct();
	}
}


?>
