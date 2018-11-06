<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="../img/icon/handshake.png" type="image/svg+xml"/>
  <title>Gestor de Serviços</title>
  <link href="css/index.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body id="body">
  <!-- Navigation -->
  <?php include_once(__DIR__ . '/_slicesHTML/navigation.php');?>
  <header>
    <div class="header-title">
      <h2>Portal de Serviços</h2>
      <h5>Em desenvolvimento</h5>
    </div>
  </header>
  <div class="page-body-1">
    <?php
    echo $_SESSION['status'];
    ?>

  </div>
</body>
</html>
