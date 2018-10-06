<?php

abstract class Crud
{
  /*
  CREATE
  READ
  UPDATE
  DELETE

  @name Manipulador De Dados
  @author Daniel José Bispo
  @access public
  */
  abstract public function insert();


  // public function insert(){
  //   $colunaBase = $this->getTableDatails();
  //   $colunaClass = $this->getAll();
  //   $sqlQuery = "INSERT INTO {$this->tabela}(";
  //   foreach ($colunaBase as $coluna) {
  //     if (in_array($coluna['Field'], $colunaClass)==False) {
  //       $sqlQuery .= $coluna['Field'];
  //       $sqlQuery .= ($coluna['Filed'] != end($colunaBase))? ", " : "";
  //     }
  //   }
  //   $sqlQuery .= ") VALUES(";
  //   foreach ($this->getAll() as $key => $value) {
  //     if (in_array($key, array('tabela', 'id', 'id_pessoa', 'ocupacao'))) continue;
  //     $type = gettype($value);
  //     $sqlQuery .= (in_array($type, array('integer', 'double', 'boolean'))) ?
  //     "{$value}" : "'{$value}'";
  //     $sqlQuery .= ($value != end($this->getAll()))? ", " : "";
  //   }
  //   $sqlQuery .= ");";
  //   echo $sqlQuery."\n";
  //   $stmp = Conexao::prepare($sqlQuery);
  //   $stmp->execute();
  // }

  public function getTableDatails(){
    $sqlQuery = "DESCRIBE {$this->tabela};";
    // echo $sqlQuery."\n";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function delete($coluna, $valor){
    $type = gettype($valor);
    $sqlQuery = "DELETE {$this->tabela} WHERE {$coluna} = ";
    $sqlQuery .= (in_array($type, array('integer', 'boolean', 'double')))?
    "{$valor};": "'{$valor}';" ;
    // echo $sqlQuery."\n";
    $stmp = Conexao::prepare($sqlQuery);
    $stmp->execute();
  }

  public function updateAll($coluna, $valor){
    $sqlQuery = "UPDATE {$this->tabela} SET ";
    $colunaObj = $this->getAll();
    $set = "";
    foreach ($colunaObj as $key => $value) {
      if ($value==NULL) continue;
        $colunaSetted[$key] = $value;
    }
    foreach ($colunaSetted as $key => $value) {
      if (in_array($key, array('tabela', 'id', 'id_pessoa'))) continue;
      $set .= "{$key} = ";
      $type = gettype($value);
      $set .= (in_array($type, array('integer', 'double', 'boolean'))) ?
      "{$value}" : "'{$value}'";
      $set .= ($key != end(array_keys($colunaSetted)))? ", " : " ";
    }
    $sqlQuery .= $set;
    $sqlQuery .= " WHERE {$coluna} = {$valor}";
    // echo $sqlQuery."\n";
    $stmp = Conexao::prepare($sqlQuery);
    $stmp->execute();
  }

  public function updateOne($coluna, $valor, $campoIdentity, $campoValue){
    $typeValor = gettype($valor);
    $typeCampoValue = gettype($campoValue);
    $sqlQuery = "UPDATE {$this->tabela} ";
    $sqlQuery .= "SET {$coluna} = ";
    $sqlQuery .= (in_array($typeValor, array('integer', 'double', 'boolean'))) ?
    "{$valor}" : "'{$valor}'";
    $sqlQuery .= " WHERE {$campoIdentity} = ";
    $sqlQuery .= (in_array($typeCampoValue, array('integer', 'double', 'boolean'))) ?
    "{$campoValue}" : "'{$campoValue}'";
    $sqlQuery .= ";";
    // echo $sqlQuery."\n";
    $stmp = Conexao::prepare($sqlQuery);
    $stmp->execute();
  }

  public function readAll(){
    $sqlQuery = "SELECT * FROM {$this->tabela};";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
      echo "[".$key."] = ". $value ."\n";
    }
  }

  public function set($atributo, $valor){
    return $this->$atributo = $valor;
  }

  public function setAll($dados){
    foreach ($this->getAll() as $atributo => $value) {
      if (in_array($atributo, array('tabela', 'id', 'id_pessoa', 'ocupacao'))) continue;
      $this->set($atributo,$dados[$atributo]);
    }
  }

  public function searchCampoByValor($campo, $valorCampo, $coluna){
    $type = gettype($valorCampo);
    $sqlQuery = "SELECT * FROM {$this->tabela} WHERE {$campo} = ";
    $sqlQuery .= (in_array($type, array('integer', 'double', 'boolean'))) ?
    "{$campo}" : "'{$valorCampo}'";
    $sqlQuery .= ";";
    // echo $sqlQuery;
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)[$coluna];
  }

}

?>
