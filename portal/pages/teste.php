<?php require_once '../config.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Pagina de Teste</title>
	<?php
	$pes = new Cliente();
	$res = $pes->showCliente(26);
	foreach ($res as $coluna => $value) {
		echo "{$coluna} = {$value}<br>";
	}
	?>
</head>
<body>
</body>
</html>
