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
	?>
	<img src="data: image/jpeg;base64,<?=$res[0]['foto']?>" alt="">
</body>
</html>
