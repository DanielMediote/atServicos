<?php
require_once '../config.php';
$type = $_POST['type'];

if ($type=="LOGAR") {
  $pessoa = new Pessoa();
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $dataResponse = $pessoa->logarPessoa($user, md5($pass));
  if ($dataResponse) {
    Sessao::setSessionData($dataResponse);
    echo "True";
  }else {
    echo "False";
  }
}elseif($type=="DESLOGAR") {
  Sessao::unsetSessionDate();
  echo "True";
}
?>
