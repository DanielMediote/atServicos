<?php require '../config.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/icon/task.png" type="image/svg+xml"/>
  <title>Novo Prestador</title>
  <link rel="stylesheet" href="../css/cadastro.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
  <!-- Navigation -->
  <?php include_once(ROOT.'/_slicesHTML/navigation.php');?>

  <!-- Formulário -->
  <div class="pagina">
    <form id="formulario" class="" method="post" enctype="multipart/form-data">
      <div class="input-group">
        <h2>Resgistro de Prestadores</h2>
        <label for="">Nome Completo</label>
        <input class="cadastro-input" type="text" name="nome" value="" maxlength="50" size="50">
        <i class="fa fa-user"><div class="linha"></div></i>

        <label for="">E-mail</label>
        <input class="cadastro-input" type="text" name="email" value="" maxlength="50" size="50">
        <i class="fa fa-envelope"><div class="linha"></div></i>

        <label for="">Telefone</label>
        <input class="cadastro-input" type="text" name="telefone" value="" placeholder="+(00) 9 0000-0000" maxlength="14" size="15">
        <i class="fa fa-phone"><div class="linha"></div></i>

        <label for="">CPNJ/CPF</label>
        <input class="cadastro-input" type="text" name="cpnj" value="" placeholder="000.000/0000-00" maxlength="14" size="15">
        <i class="fa fa-address-card"><div class="linha"></div></i>

        <label for="">Imagem de Perfil</label>
        <input type="file" name="img" id="id_photo" value="">

        <script type="text/javascript">
        var inputAddphoto = '<div class="upload-photo">'+
        '<i style="margin-left: 17px; margin-top: 22px;"'+
        'class="fas fa-user fa-6x"></i></div>',
        inputphoto = $('#id_photo');
        inputphoto.before(inputAddphoto);
        $('.upload-photo').on('click', function() {
          $(this).siblings('#id_photo').trigger('click');
        });
        inputphoto.on('change', function(){
          var input = $(this),
          reader = new FileReader();
          reader.onload = function (e) {
            input.siblings('.upload-photo').css('background-image', 'url(' + e.target.result + ')');
          };
          reader.readAsDataURL(this.files[0]);
        });
        </script>
        <label for="">Usuario</label>
        <input class="cadastro-input" type="text" name="usuario" value="" placeholder="Digite um nome como usuario" maxlength="30" size="30">
        <i class="fa fa-user-circle"><div class="linha"></div></i>

        <label for="">Senha</label>
        <input class="cadastro-input" type="password" name="senha" value="" placeholder="Digite uma senha" maxlength="30" size="30">
        <i class="fa fa-key"><div class="linha"></div></i>

      </div>
      <label for="">Genero</label>
      <select class="" name="genero">
        <option value="" selected default hidden>Genero</option>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
      </select>
      <?php
      $estado = new Estado();
      $brasil = array('Norte','Sul','Centro-Oeste', 'Sudeste', 'Nordeste');
      ?>

      <label for="">Logadouro</label>
      <div class="input-group-col">
        <select class="" name="estado_id" id="estado" onchange="loadCidades()">
          <option value="" selected disabled hidden>Selecionar o Estado...</option>
          <?php foreach ($brasil as $key => $regiao): ?>
            <optgroup label="<?=$regiao?>">
              <?php foreach ($estado->readPerRegion($regiao) as $key => $tupla): ?>
                <option value="<?=$tupla['id']?>"><?=$tupla['nome'];?></option>
              <?php endforeach; ?>
            <?php endforeach; ?>
          </optgroup>
        </select>
        <select class="" name="cidade_id" id="cidade">
          <option value="" hidden>Selecione o Estado...</option>
        </select>
      </div>

      <label for="">Cargo de Serviço</label>
      <?php //$servico = new Servico() ?>
      <?php //foreach ($servico->readAll() as $key => $value): ?>
        <select class="" name="id_servico">
          <option value="">Cargo 1</option>
          <option value="">Cargo 2</option>
          <option value="">Cargo 3</option>
        </select>
        <?php //endforeach; ?>
      <div class="termos">
        <input type="checkbox" id="terms" value="X" onclick="prosseguir()">Eu li e concordo com <u>Termos de Política e Privacidade</u>.
      </div>
      <button class="cadastro-input" type="button" id="enviar">INserir Prestador</button>
    </form>
  </div>
  <script src="/js/formularioScript.js" charset="utf-8"></script>
</body>
</html>
