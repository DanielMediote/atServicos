<?php
require 'config.php';

switch (REQ_URL) {

  case '/home':
  header('Location: '.HOST);
  break;

  case '/cadastro':
  header('Location: '.HOST.'/pages/cadastro.php');
  break;

  default:
  header('Location: '.HOST.'/errorpages/404.html');
  break;
}

?>
