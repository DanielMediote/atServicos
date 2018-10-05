<!DOCTYPE html>
<?php require('../config.php'); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/icon/interview.png" type="image/svg+xml"/>
  <title>Lista de Pessoas</title>
  <link rel="stylesheet" href="../css/pessoas.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
  <?php include_once(ROOT.'/_slicesHTML/navigation.php');?>
  <div class="tabela-pessoas">
    <?php $pessoa = new Pessoa();?>
    <?php foreach ($pessoa->readPessoaLista() as $tupla => $value):?>
      <figure class="snip0045">
        <figcaption>
          <h2><?=$value['nome']?></h2>
          <p><i class="fa fa-at"></i> <?=$value['email']?></p>
          <p><i class="fa fa-phone"></i> <?=$value['telefone']?></i></p>
          <p><i class="fa fa-user"></i> <?=$value['usuario']?></i></p>
          <p><i class="fa fa-map-marked-alt"></i> <?=$value['cidade']?>, <?=$value['estado']?></i></p>
          <div class="icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-github"></i></i></a>
          </div>
        </figcaption>
        <?php
        $srcImage;
        if($value['foto'] == NULL){
          $srcImage = "../img/semfoto.jpg";
        }else{
          $srcImage = "data:image/jpeg;base64,".$value['foto'];
        }
        ?>
        <img src="<?=$srcImage?>" alt="avatar"/>
        <div class="position">Ocupação : <?=$value['ocupacao']?></div>
      </figure>
    <?php endforeach; ?>
  </div>
</body>
</html>
