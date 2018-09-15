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
  abstract public function readAll();

  public function search($value)
  {
    $sqlQuery = "SELECT * FROM {$this->tabela} WHERE :id = {$value}";
    $stmp = Conexao::prepare($sqlQuery);
    $stmp->bindParam(':id',$this->id, PARAM_INT);
    $stmp->execute();
    return $smtp->fetchAll();
  }

  public function delete($valor)
  {
    $sqlQuery = "DELETE {$this->tabela} WHERE :campo = {$valor}";
    $stmp = Conexao::prepare($sqlQuery);
    $stmp->execute();
  }

  public function update($novoValor)
  {
    $sqlQuery = "UPDATE {$this->tabela} SET :campo = $novoValor WHERE servico_id = :id";
    $stmp = Conexao::prepare($sqlQuery);
    $stmp->bindParam(':id',$this->id,PARAM_INT);
    $stmp->execute();
  }

  public function get($atributo)
  {
    if (isset($atributo)) {
      return $this->$atributo;
    } else {
      return $this->NULL;
    }

  }
  public function set($atributo, $valor)
  {
    return $this->$valor = $valor;
  }

  public function getObjClass()
  {  
    return get_object_vars($this);
  }

}

?>
