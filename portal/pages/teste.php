<?php require_once '../config.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Pagina de Teste</title>
	<?php
	$listaEstado = new Estado();
	$regioesBr = array('Norte','Sul','Centro-Oeste', 'Sudeste', 'Nordeste');
	?>
	<select class="" name="Estado">
		<?php foreach ($regioesBr as $key => $regiao): ?>
		<optgroup label="<?=$regiao?>">
			<?php foreach ($listaEstado->readPerRegion($regiao) as $keyEstado => $value): ?>
				<option value="$value['id']"><?=$value['nome']?></option>
			<?php endforeach; ?>
		<?php endforeach; ?>
		</optgroup>
	</select>
</head>
<body>
</body>
</html>
