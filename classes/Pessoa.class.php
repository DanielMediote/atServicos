<?php

// Inserção do Objeto Classe Pessoa, e empregamento dos seus atributos
/**
*
*/


class Pessoa extends Crud
{
  protected $tabela = "PESSOA";
  protected $id;
  protected $pes_nome;
  protected $pes_email;
  protected $pes_telefone;
  protected $pes_usuario;
  protected $pes_senha;
  protected $pes_foto;
  protected $pes_logadoruo;
  protected $pes_numero;
  protected $pes_bairro;
  protected $cidade_id;
  protected $cidade_estado_id;

  public function __construct()
  {
    // echo "Você instânciou um(a) " .get_class($this) ."\n";
  }

  public function readAll()
  {
    $sqlQuery = "SELECT * FROM {$this->tabela}";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function updateForeignKey($idPessoa){
    $sqlQuery = "CALL updateForeignKey('".$this->tabela."',".$idPessoa.", '".$this->pes_email."');";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
  }

  public function getPessoaId()
  {
    $sqlQuery = "SELECT id FROM {$this->tabela} WHERE pes_email = '".$this->pes_email."'";
    $stmt = Conexao::prepare($sqlQuery);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    return $res['id'];
  }

  public function logarPessoa($nome, $senha)
  {

  }

}
