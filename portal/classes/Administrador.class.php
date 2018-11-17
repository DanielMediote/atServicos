<?php

class Administrador extends Pessoa
{

  protected $tabela = "ADMINISTRADOR";

  public function showAdmin($id){
    $sqlQuery = "SELECT
		PESSOA.nome,
		PESSOA.email,
		PESSOA.telefone,
		PESSOA.genero,
		PESSOA.usuario,
		ESTADO.nome AS Estado,
		CIDADE.nome AS Cidade
		FROM ADMINISTRADOR
		JOIN PESSOA ON ADMINISTRADOR.id_pessoa = PESSOA.id
		JOIN ESTADO ON ESTADO.id = PESSOA.estado_id
		JOIN CIDADE ON CIDADE.id = PESSOA.cidade_id
		AND PESSOA.id = {$id};";
		$stmt = Conexao::prepare($sqlQuery);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function cadastrarPrestador($dadosPrestador, $pessoa, $prestador){
    $pessoa->setAll($dadosPrestador);
    $pessoa->insert();
    $prestador->setAll($dadosPrestador);
    $prestador->insert();
    $id_pes = $pessoa->searchCampoByValor('email', $pessoa->get('email'), 'id');
    $pessoa->updateOne('ocupacao', get_class($prestador), 'email', $prestador->get('email'));
    $prestador->updateOne('id_pessoa', $id_pes , 'cpnj', $prestador->get('cpnj'));
  }

}


 ?>
