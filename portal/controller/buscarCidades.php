<?php
require_once 'autoload.php';
$id_estado = $_POST['id'];
$cidade = new Cidade();
$cidade->mostrarCidades($id_estado);
?>
