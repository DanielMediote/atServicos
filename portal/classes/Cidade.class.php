<?php




class Cidade extends Crud{

  protected $tabela = "CIDADE";
  protected $id;
  protected $nome;
  protected $estado;


  function __construct(){
    // echo "Olá Cidade";
  }

  public function readAll(){
    $sqlQuery = "SELECT * FROM {$this->tabela}";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function insert(){}

  public function readByEstado($id){
      $sqlQuery = "SELECT * FROM {$this->tabela} WHERE estado = {$id};";
      $stmt = Conexao::prepare($sqlQuery);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function mostrarCidades($id_estado){
    foreach ($this->readByEstado($id_estado) as $key => $value) {
      echo "<option value='".$value['id']."'>".$value['nome']."</option>";
    }
  }
}


 ?>
