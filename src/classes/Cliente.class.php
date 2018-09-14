<?php


/**
*
*/
class Cliente extends Pessoa
{
  protected $cpfCliente;
  protected $agendaCliente;
  protected $pontosCliente;

  function __construct($cpfCliente, $agendaCliente, $pontosCliente)
  {
    parent::__construct($idPessoa, $nomePessoa, $endPessoa, $telefonePessoa,
    $usuarioPessoa, $senhaPessoa, $cpfCliente, $agendaCliente, $pontosCliente);

    $this->cpfCliente = $cpfCliente;
    $this->agendaCliente = $agendaCliente;
    $this->pontosCliente = $pontosCliente;
  }
}







?>
