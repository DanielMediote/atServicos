<?php
require 'config.php';

switch (REQ_URL) {

  default:
  header('Location: '.HOST.'/errorpages/oqueéisso.html');
  break;
}

?>
