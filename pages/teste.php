<!DOCTYPE html>
<html>
<head>
	<title>Pagina de Teste</title>
</head>
<body>
	<?php
	require_once '../controller/autoload.php';
	$admin = new Administrador();

	$admin->getDetalhes();
	?>
</body>
</html>
