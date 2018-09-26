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

  abstract function updateForeignKey($id);

  public function insert(){
    $sqlQuery = "INSERT INTO {$this->tabela}(";
    foreach ($this->getAtributos() as $key => $value) {
      if (in_array($key, array('tabela', 'id' , 'id_pessoa'))) continue;
      $sqlQuery .= $key;
      $sqlQuery .= ($key != end(array_keys($this->getAtributos())))? ", " : "";
    }
    $sqlQuery .= ") VALUES(";
    foreach ($this->getAtributos() as $key => $value) {
      if (in_array($key, array('tabela', 'id', 'id_pessoa'))) continue;
      $type = gettype($value);
      $sqlQuery .= (in_array($type, array('integer', 'double', 'boolean'))) ?
      "{$value}" : "'{$value}'";
      $sqlQuery .= ($value != end($this->getAtributos()))? ", " : "";
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
    foreach ($this->getAtributos() as $key => $value) {
      if (in_array($key, array('tabela', 'id'))) continue;
      $set .= "{$key} = ";
      $type = gettype($value);
      $set .= (in_array($type, array('integer', 'double', 'boolean'))) ?
      "{$value}" : "'{$value}'";
      $set .= ($value != end($this->getAtributos()))? ", " : " ";
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
    foreach ($this->getAtributos() as $key => $value) {
      echo "[".$key."] = ". $value ."\n <br>";
    }
  }

  public function set($atributo, $valor){
    return $this->$atributo = $valor;
  }

  public function setAll($dados){
    foreach ($this->getAtributos() as $atributo => $value) {
      if (in_array($atributo, array('tabela', 'id'))) continue;
      $this->set($atributo,$dados[$atributo]);
    }
  }

  public function getAtributos(){
    return get_object_vars($this);
  }

}

?>
