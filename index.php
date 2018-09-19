<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Serviços Online</title>
  <link rel="stylesheet" href="<?=HOST?>/view/css/cssIndex.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <div id="pagina">
    <?php 
    require_once("./modal/_partsHTML/navBar.php");
    ?>
    <div class="wrapper">
      <div class="header">
        <div class="logo-texto">
          <div id="table">
            <div id="centeralign">
              <h1 class="title">on services</h1>
              <p class="subtitle">Lorem ipsum dolor sit amet.</div>
              </div>
            </div>
          </div>
        </div>
        <?php 
        require_once("./modal/_partsHTML/footer.php");
        ?>
      </div>
    </body>
    </html>
