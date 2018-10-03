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

	public function readOne($email){
    $sqlQuery = "SELECT
		CLIENTE.nome AS 'Nome Completo',
		CLIENTE.usuario AS 'Usuario',
		CLIENTE.email AS 'E-mail',
		CLIENTE.telefone AS 'Telefone',
		CLIENTE.cpf AS 'CPF',
		CIDADE.nome AS 'Cidade',
		ESTADO.nome AS 'Estado'
		FROM {$this->tabela}
		JOIN ESTADO ON CLIENTE.estado_id = ESTADO.id
		JOIN CIDADE ON CLIENTE.estado_id = CIDADE.id
		WHERE email = '{$email}';";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}


?>
