<?php
/**
*
*/
class Contrato extends Crud{

  protected $tabela = "CONTRATO";
  protected $id;
  protected $id_servico;
  protected $id_cliente;
  protected $id_prestador;


  public function insert(){
    $sqlQuery = "INSERT INTO CONTRATO
    (id_servico, id_cliente, id_prestador) VALUES
    (:servico, :cliente, :prestador);";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->bindParam(':servico', $this->id_servico, PDO::PARAM_INT);
    $stmt->bindParam(':cliente', $this->id_cliente, PDO::PARAM_INT);
    $stmt->bindParam(':prestador', $this->id_prestador, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function listaCotrantratosPorCliente($id_cliente){
    $query = "SELECT
    CONTRATO.id,
    SERVICO.nome as servico_nome,
    SERVICO.custo as servico_custo,
    PESSOA.nome as prestador_nome,
    PESSOA.telefone as prestador_telefone
    FROM CONTRATO
    JOIN SERVICO ON CONTRATO.id_servico = SERVICO.id
    JOIN PRESTADOR ON PRESTADOR.id = SERVICO.id_prestador
    JOIN PESSOA ON PRESTADOR.id_pessoa = PESSOA.id
    JOIN CLIENTE ON CLIENTE.id = CONTRATO.id_cliente
    AND CONTRATO.id_cliente = {$id_cliente};";
    $stmt = Conexao::prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function listarContratosDoClientePorPrestador($id_prestador){
    $query = "SELECT
    SERVICO.id,
    PESSOA.nome as cliente_nome,
    PESSOA.telefone cliente_telefone,
    SERVICO.descricao as servico_descricao
    FROM CONTRATO
    JOIN CLIENTE ON CLIENTE.id = CONTRATO.id_cliente
    JOIN PESSOA ON PESSOA.id = CLIENTE.id_pessoa
    JOIN SERVICO ON SERVICO.id = CONTRATO.id_servico
    JOIN PRESTADOR ON PRESTADOR.id = CONTRATO.id_prestador
    AND PRESTADOR.id = {$id_prestador};";
    $stmt = Conexao::prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function listarLimiteContratosCliente($id_cliente, $id_servico){
    $query = "SELECT
    CONTRATO.id_servico,
    CONTRATO.id_cliente
    FROM CONTRATO WHERE id_servico = {$id_servico} AND id_cliente = {$id_cliente};";
    $stmt = Conexao::prepare($query);
    $stmt->execute();
    return count($stmt->fetchAll());
  }
}


?>
