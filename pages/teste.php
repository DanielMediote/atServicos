<!DOCTYPE html>
<html>
<head>
	<title>Pagina de Teste</title>
</head>
<body>
	<?php
		require '../controller/autoload.php';
		session_start();
		$pessoa = new Pessoa();
		$dataResponse = $pessoa->logarPessoa('Daniel', '12345daniel');
		foreach ($dataResponse as $key => $value) {
			$_SESSION[$key] = $value;
		}
	 ?>

</body>
</html>
