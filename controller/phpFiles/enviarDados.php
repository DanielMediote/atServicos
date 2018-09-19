<?php
// header('Content-Type: application/json');
function my_autoload ($className) {
  include_once(_s_DIR__ . "/../classes/" . $className . ".class.php");
}
spl_autoload_register("my_autoload");
// $cliente = new Cliente();
echo "PHP";
var_dump($_POST);
// $nome = filter_input(INPUT_POST, 'nome');
// $nome = $_FILE('nome');
// echo $nome;
// foreach ($cliente->getAtributos() as $atributo => $valor) {
//   if (!in_array($atributo, array('tabela'))) {
//     $cliente->set($atributo, filter_input(INPUT_POST, $atributo));
//   }
// }
// $cliente->pessoaDetalhes();

?>
