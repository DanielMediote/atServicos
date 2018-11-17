<?php
require_once '../config.php';
$dados = $_POST;
$servico = new Servico();
$prestador = new Prestador();
$id_prestador = $prestador->searchCampoByValor('id_pessoa', $_SESSION['id'], 'id');
$dados['id_prestador'] = $id_prestador;
foreach ($dados as $key => $value) {
  $servico->set($key, $value);
}
$servico->insert();
?>
