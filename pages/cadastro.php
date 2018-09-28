
<?php require '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/icon/interview.png" type="image/svg+xml"/>
  <title>Services Manager</title>
  <link rel="stylesheet" href="../css/cadastro.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>

  <!-- Navigation -->
  <?php include_once(__DIR__ . '/../_slicesHTML/navigation.php');?>

  <!-- Formulário -->
  <div class="pagina">
    <form id="formulario" class="" method="post">
      <div class="input-group">
        <h2>Resgistro de Clientes</h2>
        <label for="">Nome</label>
        <input class="cadastro-input" type="text" name="pes_nome" value="" placeholder="Seu nome completo" maxlength="50" size="50">
        <i class="fa fa-user"><div class="linha"></div></i>

        <label for="">Repetir senha</label>
        <input class="cadastro-input" type="password" name="pes_senha" id="senha2" value="" placeholder="Digite uma senha" maxlength="30" size="30">
        <i class="fa fa-key"><div class="linha"></div></i>

        <label for="">E-mail</label>
        <input class="cadastro-input" type="text" name="pes_email" value="" placeholder="seuemail@email.com" maxlength="50" size="50">
        <i class="fa fa-envelope"><div class="linha"></div></i>

        <label for="">Telefone</label>
        <input class="cadastro-input" type="text" name="pes_telefone" value="" placeholder="+(00) 9 0000-0000" maxlength="14" size="15">
        <i class="fa fa-phone"><div class="linha"></div></i>

        <label for="">CPF</label>
        <input class="cadastro-input" type="text" name="pes_cpf" value="" placeholder="000.000.000 - 00" maxlength="11" size="15">
        <i class="fa fa-address-card"><div class="linha"></div></i>

      </div>
      <select class="" name="pes_genero">
        <option selected default hidden>Genero</option>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
      </select>
      <?php
      require '../controller/autoload.php';
      $estado = new Estado();
      $brasil = array('Norte','Sul','Centro-Oeste', 'Sudeste', 'Nordeste');
      ?>
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
        <script type="text/javascript">
        function loadCidades() {
          var id = $('#estado').val();
          var options = $('#cidade');
          $.ajax({
            url: '/controller/buscarCidades.php',
            type: 'POST',
            data: {id : id}
          })
          .done(function(res) {
            options.html("<option value='' selected disabled hidden>Selecionar Cidade...</option>");
            options.append(res);
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
        }
        </script>
        <select class="" name="estado_cidade_id" id="cidade">
          <option value="" hidden>Selecione o Estado...</option>
        </select>
      </div>
      <button class="cadastro-input" type="button" name="button" id="enviar">Enviar Dados</button>
    </form>
  </div>
  <script src="js/formularioScript.js" charset="utf-8"></script>
</body>
</html>
