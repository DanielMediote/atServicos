<?php
session_start();

echo "Olá";

if (filter_has_var(INPUT_POST, 'logoff')) {
  $_SESSION['logado'] = false;
  echo "<script type='text/javascript'>console.log('deslogado');</script>";
}
if (filter_has_var(INPUT_POST, 'logar')) {
  $_SESSION['logado'] = true;
  echo "<script type='text/javascript'>console.log('logado');</script>";
}




?>
