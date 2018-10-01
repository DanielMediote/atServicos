<?php
require_once 'autoload.php';
$dados = json_decode(stripslashes($_POST['dados']), true);
// $file = $_FILES['imagem'];
$dados['senha'] = md5($dados['senha']);
// $arquivo = new File($file);
// $arquivo->detalhesFile();
// foreach ($dados as $key => $value) {
//   echo $key . " = ".$value."\n";
// }

$pessoa = new Pessoa();
$cliente = new Cliente();
$prestador = new Prestador();
$admin = new Administrador();

if ($_SESSION['ocupacao'] == 'Administrador') {
  $admin->cadastrarPrestador($dados, $pessoa, $prestador);
}else {
  $pessoa->setAll($dados);
  $pessoa->insert();
  // $pessoa->getDetalhes();
  $id_pessoa = $pessoa->getPessoaId();
  $cliente->setAll($dados);
  $cliente->insert();
  // $cliente->getDetalhes();
  $pessoa->updateOne('ocupacao', get_class($cliente));
  $cliente->updateForeignKey($id_pessoa);
}

?>
