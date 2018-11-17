<?php
require_once '../config.php';

Sessao::open();
$pessoa = new Pessoa();
$cliente = new Cliente();
$prestador = new Prestador();
$id = json_decode(json_encode($_SESSION['id'],JSON_NUMERIC_CHECK));

if ($_SESSION['ocupacao'] == "Cliente") {
  $cliente->delete('id_pessoa', $id);
  $pessoa->delete('id', $id);
} else {
  $prestador->delete('id_pessoa', $id);
  $pessoa->delete('id', $id);
}
Sessao::unsetSessionDate();

?>
