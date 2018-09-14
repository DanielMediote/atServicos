<?php

// Inserção do Objeto Classe Pessoa, e empregamento dos seus atributos
class Pessoa extends Crud
{
    protected $tabela = "PESSOA";
    protected $idPessoa;
    protected $nomePessoa;
    protected $emailPessoa;
    protected $telefonePessoa;
    protected $usuarioPessoa;
    protected $senhaPessoa;
    protected $cpfPessoa;

    public function __construct()
    {
    }

    
}
