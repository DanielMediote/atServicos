<?php
require_once '../config.php';
$contrato = new Contrato();
$id = intval($_POST['id_contrato']);
$contrato->delete('id', $id);
 ?>
