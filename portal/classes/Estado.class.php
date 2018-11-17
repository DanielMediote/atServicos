<?php





/**
 *
 */
class Estado extends Crud{

  protected $tabela = 'ESTADO';
  protected $id;
  protected $nome;
  protected $uf;
  protected $regiao;

  public function insert(){}

  public function readAll(){
    $sqlQuery = "SELECT * FROM {$this->tabela}";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function readPerRegion($regiao){
    $sqlQuery = "SELECT * FROM {$this->tabela} WHERE regiao = '".$regiao."';";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

 ?>
