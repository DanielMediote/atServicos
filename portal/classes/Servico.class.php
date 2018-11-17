<?php

class Servico extends Crud
{
    protected $tabela = "SERVICO";
    protected $id;
    protected $nome;
    protected $categoria;
    protected $custo;
    protected $descricao;
    protected $id_prestador;

    public function insert(){
      $query = "INSERT INTO SERVICO
      (nome, categoria, custo, descricao, id_prestador) VALUES
      (:nome, :categoria, :custo, :descricao, :id_pres);";
      $stmt = Conexao::prepare($query);
      $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR, 45);
      $stmt->bindParam(':categoria', $this->categoria, PDO::PARAM_STR, 45);
      $stmt->bindParam(':custo', $this->custo, PDO::PARAM_STR, 45);
      $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR, 45);
      $stmt->bindParam(':id_pres', $this->id_prestador, PDO::PARAM_INT, 45);
      $stmt->execute();
    }



    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param type var Description
     * @return return type
     */
    public function listarServicos(){
        $query = "SELECT
        SERVICO.id,
        SERVICO.nome as nome_servico,
        SERVICO.custo as preco,
        SERVICO.categoria,
        SERVICO.descricao,
        PESSOA.nome as nome_prestador,
        PESSOA.telefone as telefone_prestador
        FROM SERVICO
        JOIN PRESTADOR ON PRESTADOR.id = SERVICO.id_prestador
        JOIN PESSOA ON PRESTADOR.id_pessoa = PESSOA.id;";
        $stmt = Conexao::prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function listarServicoPorPrestador($id_prestador)
    {
        $sqlQuery = "SELECT
    SERVICO.id,
    SERVICO.nome,
    SERVICO.categoria,
    SERVICO.custo,
    SERVICO.descricao
    FROM SERVICO
    JOIN PRESTADOR ON PRESTADOR.id = SERVICO.id_prestador
    JOIN PESSOA ON PRESTADOR.id_pessoa = PESSOA.id
    AND PRESTADOR.id = {$id_prestador};
    ";
        $stmt = Conexao::prepare($sqlQuery);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
