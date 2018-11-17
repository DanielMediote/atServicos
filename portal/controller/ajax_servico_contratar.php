<?php
require_once '../config.php';
$contrato = new Contrato();
$prestador = new Prestador();
$cliente = new Cliente();
$servico = new Servico();

$id_pre = $servico->searchCampoByValor('id', $_POST['id_servico'], 'id_prestador');
$id_cli = $cliente->searchCampoByValor('id_pessoa', $_SESSION['id'], 'id');

$contrato->set('id_servico', $_POST['id_servico']);
$contrato->set('id_prestador', $id_pre);
$contrato->set('id_cliente', $id_cli);

$contrato->insert();
 ?>
