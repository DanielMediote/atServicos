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

  protected $tabela;


  // Criação de 2 métodos abstratos que serão instânciados pelas classes herdeiras
  // abstract public function readAll();

  public function insert(){
    // $keysArray = array_keys($this->getAtributos());
    // $valueArray = array_values($this->getAtributos());
    // $campos = implode(", ", array_filter($keysArray,function($res){
    // return !in_array($res, array('tabela', 'id'));
    // }, ARRAY_FILTER_USE_BOTH));
    // $valores = implode("', '",array_filter($valueArray,function($res){
    //   return !in_array($res, array(0, 4));
    // }, ARRAY_FILTER_USE_BOTH));

    $sqlInsert = "INSERT INTO {$this->tabela}(";
    foreach ($this->getAtributos() as $key => $value) {
      if (in_array($key, array('tabela', 'id'))) continue;
      $sqlInsert .= $key;
      $sqlInsert .= ($key != end(array_keys($this->getAtributos())))? ", " : "";
    }
    $sqlInsert .= ") VALUES(";
    foreach ($this->getAtributos() as $key => $value) {
      if (in_array($key, array('tabela', 'id'))) continue;
      $type = gettype($value);
      $sqlInsert .= (in_array($type, array('integer', 'double', 'boolean'))) ?
      "{$value}" : "'{$value}'";
      $sqlInsert .= ($value != end($this->getAtributos()))? ", " : "";
    }
    $sqlInsert .= ");";
    // print($sqlInsert);
    $stmp = Conexao::prepare($queryInsert);
    $stmp->execute();
  }

  public function search($value){
    $sqlQuery = "SELECT * FROM {$this->tabela} WHERE :id = {$value}";
    $stmp = Conexao::prepare($sqlQuery);
    $stmp->bindParam(':id',$this->id, PARAM_INT);
    $stmp->execute();
    return $smtp->fetchAll();
  }

  public function delete($valor){
    $sqlQuery = "DELETE {$this->tabela} WHERE id = {$valor}";
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
    // echo end($this->getAtributos());
    // $stmp = Conexao::prepare($sqlQuery);
    // $stmp->bindParam(':id',$this->id,PARAM_INT);
    // $stmp->execute();
  }

  public function get($atributo){
    if (isset($atributo)) {
      return $this->$atributo;
    } else {
      return $this->NULL;
    }
  }

  public function set($atributo, $valor){
    return $this->$atributo = $valor;
  }

  public function getAtributos(){
    return get_object_vars($this);
  }

}

?>
