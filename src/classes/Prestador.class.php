<?php

/**
 *
 */
class Prestador extends Pessoa
{
    protected $tabela = "PRESTADOR";
    protected $cpnjPrestador;
    protected $empresaPrestador;
    protected $servicoPrestador;
    protected $areaAtuacao;
    protected $notaPrestador;

    public function __construct()
    {
    }

    // function __construct($cpnjPrestador, $empresaPrestador, $servicoPrestador,
    // $areaAtuacao, $notaPrestador)
    // {
    //   parent::__construct($idPessoa, $nomePessoa, $endPessoa, $telefonePessoa,
    //   $usuarioPessoa, $senhaPessoa, $cpnjPrestador, $empresaPrestador,
    //   $servicoPrestador, $areaAtuacao, $notaPrestador);
    //   $this->cpnjPrestador = $cpnjPrestador;
    //   $this->empresaPrestador = $empresaPrestador;
    //   $this->servicoPrestador = $servicoPrestador;
    //   $this->areaAtuacao = $areaAtuacao;
    //   $this->notaPrestador = $notaPrestador;
    // }

}
