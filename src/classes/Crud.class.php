<?php

abstract class Crud
{
/*
CREATE
READ
UPDATE
DELETE
 */

    protected $tabela;

    abstract public function insert();
    abstract public function selectAll();

    public function search($value)
    {
        $sqlQuery = "SELECT * FROM {$this->tabela}";
        $stmp = Conexao::prepare($sqlQuery);
        $stmp->execute();
        return $smtp->fetchAll();
    }

    public function delete($value)
    {
        
    }

    public function update($value)
    {

    }

    public function get($nome)
    {
        return $nome;
    }
    public function set($var)
    {
        
    }
}
