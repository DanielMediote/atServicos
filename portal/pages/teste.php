<?php require_once '../config.php'; ?>
<?php require_once HEAD; ?>
</head>
<body>
  <?php
  $contrato = new Contrato();
  $rows = $contrato->listarLimiteContratosCliente(3, 8);
  print($rows);
  // foreach ($contrato->listarLimiteContratosCliente(3, 8) as $key => $value) {
  //
  // }

  ?>
</body>
</html>
