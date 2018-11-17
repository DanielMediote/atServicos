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
	protected $qte_servicos;

	public function showPrestador($id){
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

	public function insert(){
		$sqlQuery = "INSERT INTO PRESTADOR(cpnj, id_pessoa) VALUES(:cpnj, :id_pessoa);";
		$stmt = Conexao::prepare($sqlQuery);
		$stmt->bindParam(":cpnj",$this->cpnj, PDO::PARAM_STR, 45);
		$stmt->bindParam(":id_pessoa",$this->id_pessoa, PDO::PARAM_STR, 45);
		$stmt->execute();
	}
}
?>
