<?php
// require_once '../config.php';
// $pessoa = new Pessoa();
// $cliente = new Cliente();
// $prestador = new Prestador();
// $admin = new Administrador();
//
// $dados = json_decode(stripslashes($_POST['dados']), true);
// $dados['senha'] = md5($dados['senha']);
// $file = $_FILES['file'];
// $arquivo = new File($file);
// $dados['foto'] = $arquivo->get('base64');
// switch ($_SESSION['ocupacao']) {
//   case 'Administrador':
//     $admin->cadastrarPrestador($dados, $pessoa, $prestador);
//   break;
//
//   default:
//     $pessoa->setAll($dados);
//     $pessoa->insert();
//     $cliente->setAll($dados);
//     $cliente->insert();
//     $id_pes = $pessoa->searchCampoByValor('email', $pessoa->get('email'), 'id');
//     $pessoa->updateOne('ocupacao', get_class($cliente), 'email', $cliente->get('email'));
//     $cliente->updateOne('id_pessoa', $id_pes , 'cpf', $cliente->get('cpf'));
//   break;
// }
?>
