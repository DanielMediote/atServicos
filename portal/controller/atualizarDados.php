<?php
require_once 'autoload.php';
$dados = $_POST['dados'];

$sessao = new Sessao();
$pessoa = new Pessoa();
$cliente = new Cliente();
$prestador = new Prestador();

$estado = new Estado();
$cidade = new Cidade();


$dados['id'] = $_SESSION['id'];
$dados['cidade_id'] = $cidade->searchCampoByValor('nome', $dados['cidade'], 'id');
$dados['estado_id'] = $estado->searchCampoByValor('nome', $dados['estado'], 'id');

var_dump($dados['cidade_id']);
var_dump($dados['estado_id']);
// if ($_SESSION['ocupacao'] == 'Cliente') {
//   $pessoa->atualizarDados($dados, 'id');
//   $cliente->atualizarDados($dados, 'id_pessoa');
// } elseif ($_SESSION['ocupacao'] == 'Prestador') {
//   $pessoa->atualizarDados($dados, 'id');
//   $prestador->atualizarDados($dados, 'id_pessoa');
// }



 ?>
