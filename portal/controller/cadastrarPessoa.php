<?php
require_once '../controller/autoload.php';
$dados = json_decode(stripslashes($_POST['dados']), true);
$dados['senha'] = md5($dados['senha']);
$file = $_FILES['imagem'];
$arquivo = new File($file);
$arquivo->detalhesFile();
$dados['foto'] = $arquivo->get('base64');
// foreach ($dados as $key => $value) {
//   echo $key . " = ".$values."\n";
// }
$sessao = new Sessao();
$pessoa = new Pessoa();
$cliente = new Cliente();
$prestador = new Prestador();
$admin = new Administrador();

if ($_SESSION['ocupacao'] == 'Administrador') {
  $admin->cadastrarPrestador($dados, $pessoa, $prestador);
}else {
  $pessoa->setAll($dados);
  $pessoa->insert();
  // $id_pessoa = $pessoa->getPessoaId();
  $cliente->setAll($dados);
  $cliente->insert();
  // $pessoa->updateOne('ocupacao', get_class($cliente));
  // $cliente->updateForeignKey($id_pessoa);
}

?>
