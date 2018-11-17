<?php
require_once '../config.php';
$servico = new Servico();
$contrato = new Contrato();
$contrato->delete('id_servico', $_POST['id_servico']);
$servico->delete('id', $_POST['id_servico']);
?>
