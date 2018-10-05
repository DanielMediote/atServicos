<?php
require_once '../config.php';
$dados = json_decode(stripslashes($_POST['dados']), true);
$dados['senha'] = md5($dados['senha']);
$dados['foto'] = "";
$file = $_FILES['file'];
$arquivo = new File($file);
$dados['foto'] = $arquivo->get('base64');
// foreach ($dados as $key => $value) {
//   echo "dados['{$key}'] = {$value}\n";
// }
$pessoa = new Pessoa();
$cliente = new Cliente();
$prestador = new Prestador();
$admin = new Administrador();

if ($_SESSION['ocupacao'] == 'Administrador') {
  $admin->cadastrarPrestador($dados, $pessoa, $prestador);
}else {
  $pessoa->setAll($dados);
  $pessoa->insertPessoa();
  $cliente->setAll($dados);
  $cliente->insertCliente();
  $id_pes = $pessoa->searchCampoByValor('email', $pessoa->get('email'), 'id');
  $pessoa->updateOne('ocupacao', get_class($cliente), 'email', $cliente->get('email'));
  $cliente->updateOne('id_pessoa', $id_pes , 'cpf', $cliente->get('cpf'));
}

?>
