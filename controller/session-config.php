<?php
session_start();
require_once '../controller/autoload.php';
$cookie = $_POST['cookie'];

$sessao = new Sessao();
$pessoa = new Pessoa();
$cliente = new Cliente();
$prestador = new Prestador();

if ($cookie['sessao'] == "online") {
  $dataResponse = $pessoa->logarPessoa($cookie['username'], md5($cookie['password']));
  $serverResponse;
  if ($dataResponse) {
    $sessao->openSession($dataResponse);
    $serverResponse = 'True';
  }else {
    $sessao->closeSession($pessoa);
    $serverResponse = 'False';
  }
  echo $serverResponse;
}elseif($cookie['sessao'] = "offline") {
  $sessao->closeSession($pessoa);
}





?>
