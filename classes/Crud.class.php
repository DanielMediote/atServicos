<?php

// Classe do tipo final

abstract class Crud
{
  /*
  CREATE
  READ
  UPDATE
  DELETE
  */

  abstract function readAll();

  public function insert(){
    $sqlQuery = "INSERT INTO {$this->tabela}(";
    foreach ($this->getAll() as $key => $value) {
      if (in_array($key, array('tabela', 'id' , 'id_pessoa'))) continue;
      $sqlQuery .= $key;
      $sqlQuery .= ($key != end(array_keys($this->getAll())))? ", " : "";
    }
    $sqlQuery .= ") VALUES(";
    foreach ($this->getAll() as $key => $value) {
      if (in_array($key, array('tabela', 'id', 'id_pessoa'))) continue;
      $type = gettype($value);
      $sqlQuery .= (in_array($type, array('integer', 'double', 'boolean'))) ?
      "{$value}" : "'{$value}'";
      $sqlQuery .= ($value != end($this->getAll()))? ", " : "";
    }
    $sqlQuery .= ");";
    echo $sqlQuery . "<br>";
    $stmp = Conexao::prepare($sqlQuery);
    $stmp->execute();
  }

  public function search($id){
    $sqlQuery = "SELECT * FROM {$this->tabela} WHERE :id = {$id}";
    echo "";
    // $stmp = Conexao::prepare($sqlQuery);
    // $stmp->execute();
    // return $smtp->fetch();
  }

  public function delete($id){
    $sqlQuery = "DELETE {$this->tabela} WHERE id = {$id}";
    $stmp = Conexao::prepare($sqlQuery);
    $stmp->execute();
  }

  public function update($coluna, $valor){
    $sqlQuery = "UPDATE {$this->tabela} SET ";
    $set = "";
    foreach ($this->getAll() as $key => $value) {
      if (in_array($key, array('tabela', 'id'))) continue;
      $set .= "{$key} = ";
      $type = gettype($value);
      $set .= (in_array($type, array('integer', 'double', 'boolean'))) ?
      "{$value}" : "'{$value}'";
      $set .= ($value != end($this->getAll()))? ", " : " ";
    }
    $sqlQuery .= $set;
    $sqlQuery .= " WHERE {$coluna} = {$valor}";
    echo $sqlQuery;
    $stmp = Conexao::prepare($sqlQuery);
    $stmp->execute();
  }

  public function get($atributo){
    if (isset($atributo)) {
      return $this->$atributo;
    } else {
      return $this->NULL;
    }
  }

  public function getAll(){
    return get_object_vars($this);
  }
  
  public function getDetalhes(){
    foreach ($this->getAll() as $key => $value) {
      echo "[".$key."] = ". $value ."\n <br>";
    }
  }

  public function set($atributo, $valor){
    return $this->$atributo = $valor;
  }

  public function setAll($dados){
    foreach ($this->getAll() as $atributo => $value) {
      if (in_array($atributo, array('tabela', 'id'))) continue;
      $this->set($atributo,$dados[$atributo]);
    }
  }


}

?>
