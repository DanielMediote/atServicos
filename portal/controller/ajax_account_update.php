<?php
require_once '../config.php';
$dataForm = $_POST;
$pessoa = new Pessoa();
$cliente = new Cliente();
$prestador = new Prestador();
$sessao = new Sessao();

$dataForm['id'] = json_decode(json_encode($_SESSION['id'],JSON_NUMERIC_CHECK));
$dataForm['cidade_id'] = json_decode(json_encode($dataForm['cidade_id'],JSON_NUMERIC_CHECK));
$dataForm['estado_id'] = json_decode(json_encode($dataForm['estado_id'],JSON_NUMERIC_CHECK));

$dataForm['senha'] = ($dataForm['senha'] == "") ? $_SESSION['senha'] : md5($dataForm['senha']) ;
$pessoa->atualizarDados($dataForm, 'id');

switch ($_SESSION['ocupacao']) {
  case 'Cliente':
    $cliente->updateOne('cpf', $dataForm['cpf'], 'id_pessoa', $dataForm['id']);
    break;
  case 'Prestador':
    $prestador->updateOne('cpnj', $dataForm['cpnj'], 'id_pessoa', $dataForm['id']);
    break;
}
?>
