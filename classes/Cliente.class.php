<?php

class Cliente extends Pessoa
{
	protected $tabela = "CLIENTE";
	protected $id;
	protected $id_pessoa;
	protected $cpf;

	public function __construct()
	{
		parent::__construct();
	}
}


?>
