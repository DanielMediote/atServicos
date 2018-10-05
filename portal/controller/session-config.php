<?php
require_once '../config.php';
$cookie = $_POST['cookie'];
$pessoa = new Pessoa();
$cliente = new Cliente();
$prestador = new Prestador();

if ($cookie['sessao'] == "online") {
  $dataResponse = $pessoa->logarPessoa($cookie['username'], md5($cookie['password']));
  $serverResponse;
  if ($dataResponse) {
    Sessao::setSessionData($dataResponse);
    $serverResponse = 'True';
  }else {
    Sessao::unsetSessionDate($pessoa);
    $serverResponse = 'False';
  }
  echo $serverResponse;
}elseif($cookie['sessao'] = "offline") {
  Sessao::unsetSessionDate($pessoa);
}





?>
