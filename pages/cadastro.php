
<?php require '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/icon/resume.png" type="image/svg+xml"/>
  <title>Services Manager</title>
  <link rel="stylesheet" href="../css/cadastroStyle.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>

  <!-- Navigation -->
  <?php include_once(__DIR__ . '/../_slicesHTML/navigation.php');?>

  <!-- Formulário -->
  <div class="formulario">
    <form id="formulario">
      <div class="row">
        <h4>Informações Básicas</h4>
        <div class="input-group input-group-icon">
          <input type="text" name="pes_nome" placeholder="Nome Completo"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="text" name="pes_usuario" placeholder="Usuario"/>
          <div class="input-icon"><i class="fa fa-user-circle"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="password" name="pes_senha" placeholder="Password"/>
          <div class="input-icon"><i class="fa fa-key"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="text" id="cpf" name="cliente_cpf" placeholder="CPF" maxlength="11"/>
          <div class="input-icon"><i class="fa fa-address-card"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="email" name="pes_email" placeholder="Email"/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="row">
          <div class="col-half">
            <div class="col-half">
              <h4>Genero</h4>
              <div class="input-group">
                <input type="radio" name="pes_genero" value="M" id="gender-male"/>
                <label for="gender-male">Masculino</label>
                <input type="radio" name="pes_genero" value="F" id="gender-female"/>
                <label for="gender-female">Femenino</label>
              </div>
            </div>
            <div class="col-half">
              <h4>Estado</h4>
              <select class="" name="estado_id">
                <option value="">Select 1</option>
              </select>
            </div>
          </div>
        </div>
        <div class="input-group input-group-icon">
          <input type="phone" name="pes_telefone" placeholder="Telefone" maxlength="14"/>
          <div class="input-icon"><i class="fa fa-phone"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="text" name="pes_bairro" placeholder="Bairro"/>
          <div class="input-icon"><i class="fa fa-user-circle"></i></div>
        </div>
      </div>
      <div class="row">
        <h4>Termos de Condições</h4>
        <div class="input-group">
          <input type="checkbox" id="terms" onclick="prosseguir()"/>
          <label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
        </div>
      </div>
      <div class="row">
        <input type="button" id="enviar" value="Enviar" style="display:none">
      </div>
    </div>
  </form>
</div>
<script src="js/formularioScript.js" charset="utf-8"></script>
</body>
</html>
