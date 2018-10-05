<?php
require_once '../config.php';
$dados = $_POST['dados'];

$pessoa = new Pessoa();
$cliente = new Cliente();
$prestador = new Prestador();
$estado = new Estado();
$cidade = new Cidade();

$dados['id'] = json_decode(json_encode($_SESSION['id'],JSON_NUMERIC_CHECK));
$dados['cidade_id'] = json_decode(json_encode($dados['Cidade'], JSON_NUMERIC_CHECK ));
$dados['estado_id'] = json_decode(json_encode($dados['Estado'], JSON_NUMERIC_CHECK ));
if ($_SESSION['ocupacao'] == 'Cliente') {
  $pessoa->atualizarDados($dados, 'id');
  $cliente->updateOne('cpf', $dados['cpf'], 'id_pessoa', $dados['id']);
} elseif ($_SESSION['ocupacao'] == 'Prestador') {
  $pessoa->atualizarDados($dados, 'id');
  $prestador->updateOne('cpnj', $dados['cpnj'], 'id_pessoa', $dados['id']);
}
?>
