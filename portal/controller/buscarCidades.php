<?php
require_once 'autoload.php';
$id_estado = $_POST['id'];
$cidade = new Cidade();
foreach ($cidade->readByEstado($id_estado) as $key => $value) {
  echo "<option value='".$value['id']."'>".$value['nome']."</option>";
}
?>
