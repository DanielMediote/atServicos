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

	public function showPrestador($id)
	{
		$sqlQuery = "SELECT
		PESSOA.nome,
		PESSOA.email,
		PESSOA.telefone,
		PRESTADOR.cpnj,
		PESSOA.genero,
		PESSOA.usuario,
		ESTADO.nome AS estado,
		CIDADE.nome AS cidade
		FROM PRESTADOR
		JOIN PESSOA ON PRESTADOR.id_pessoa = PESSOA.id
		JOIN ESTADO ON ESTADO.id = PESSOA.estado_id
		JOIN CIDADE ON CIDADE.id = PESSOA.cidade_id
		AND PESSOA.id = {$id};";
		// echo $sqlQuery;
		$stmt = Conexao::prepare($sqlQuery);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function insertPrestador()
	{
		$sqlQuery = "INSERT INTO PRESTADOR(cpnj) VALUES(:cpnj);";
		// echo $sqlQuery;
		$stmt = Conexao::prepare($sqlQuery);
		$stmt->bindParam(":cpnj",$this->cpnj, PDO::PARAM_STR, 45);
		$stmt->execute();
	}
}
?>
