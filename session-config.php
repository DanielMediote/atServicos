<?php
session_start();
require_once 'controller/autoload.php';
$cookie = $_POST['cookie'];
$pessoa = new Pessoa();
// Verificar se tem na tabela com os registros de nome e senha, e retorna 1 tupla
$dataResponse = $pessoa->logarPessoa($cookie['username'], $cookie['password']);

if ($cookie['sessao'] == "online") {
  // Resposta para o servidor, usado para alertar que os campos esao vazios ou a senha e o ligin estão incorretos
  $serverResponse;
  if ($dataResponse) {
    $_SESSION['status'] = True;
    // Atribui as variaveis globais das Sessões os valores da tupla
    foreach ($dataResponse as $key => $value) {
      $_SESSION[$key] = $value;
    }
    $serverResponse = 'True';
  }else {
    $_SESSION['status'] = False;
    $serverResponse = 'False';
  }
  echo $serverResponse;
}elseif($cookie['sessao'] = "offline") {
  // OBS =  a Sessão nunca é desabilidata, apenas é zerado todos os registros
  $_SESSION['status'] = False;
  foreach ($pessoa->getAll() as $key => $value) {
    unset($_SESSION[$key]);
  }
}





?>
