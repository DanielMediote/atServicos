<!DOCTYPE html>
<html>
<head>
	<title>Pagina de Teste</title>
</head>
<body>
	<?php
	require_once '../controller/autoload.php';
	$pessoa = new Pessoa();
	$res = $pessoa->select();
	var_dump($res);
	?>
</body>
</html>
