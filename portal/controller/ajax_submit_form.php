<?php
require_once '../config.php';
$pessoa = new Pessoa();
$cliente = new Cliente();
$prestador = new Prestador();
$admin = new Administrador();

$dados = json_decode(stripslashes($_POST['dados']), true);
$dados['senha'] = md5($dados['senha']);
$file = $_FILES['file'];
if (isset($file)) {
  $arquivo = new File($file);
  $dados['foto'] = $arquivo->get('base64');
}else {
  $dados['foto'] = "NaN";
}
if ($dados['cpnj']=="") {
  $dados['cpnj'] = "Não Informado";
} elseif($dados['cpf']==""){
  $dados['cpf'] = "Não Informado";
}

$dados['ocupacao'] = $dados['categoria'];
$pessoa->setAll($dados);
$pessoa->insert();
$id_pes = intval($pessoa->searchCampoByValor('email', $pessoa->get('email'), 'id'));
switch ($dados['categoria']) {
  case 'Prestador':
      $prestador->set('id_pessoa', $id_pes);
      $prestador->set('cpnj', $dados['cpnj']);
      $prestador->insert();
    break;

  case 'Cliente':
      $cliente->set('id_pessoa', $id_pes);
      $cliente->set('cpf', $dados['cpf']);
      $cliente->insert();
    break;

  default:

    break;
}
?>
