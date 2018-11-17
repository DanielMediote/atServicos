<?php

class Cliente extends Pessoa
{
	protected $tabela = "CLIENTE";
	protected $id;
	protected $id_pessoa;
	protected $cpf;

	public function insert(){
		$sqlQuery = "INSERT INTO CLIENTE(cpf, id_pessoa) VALUES(:cpf, :id_pessoa);";
		$stmt = Conexao::prepare($sqlQuery);
		$stmt->bindParam(":cpf",$this->cpf, PDO::PARAM_STR, 45);
		$stmt->bindParam(":id_pessoa",$this->id_pessoa, PDO::PARAM_STR, 45);
		$stmt->execute();
	}

	public function showCliente($id){
		$sqlQuery = "SELECT
		PESSOA.nome,
		PESSOA.email,
		PESSOA.telefone,
		CLIENTE.cpf,
		PESSOA.genero,
		PESSOA.usuario,
		ESTADO.nome AS Estado,
		CIDADE.nome AS Cidade
		FROM CLIENTE
		JOIN PESSOA ON CLIENTE.id_pessoa = PESSOA.id
		JOIN ESTADO ON ESTADO.id = PESSOA.estado_id
		JOIN CIDADE ON CIDADE.id = PESSOA.cidade_id
		AND PESSOA.id = {$id};";
		// echo $sqlQuery;
		$stmt = Conexao::prepare($sqlQuery);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
}


?>
