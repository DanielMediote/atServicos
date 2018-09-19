<?php require '../../config.php'; ?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">

<head>
  <title>Cadastro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/view/css/cssCadastro.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
</head>
<body>
  <div id="pagina">
    <?php include_once ROOT.'/modal/_partsHTML/navBar.php';?>
    <div class="container">
      <?php

      ?>
      <form id="formulario" action="" method="post">
        <!-- Field Inputs -->
        <div class="form-box">
          <h4>Informações Básicas</h4>
          <div class="input-group input-group-icon">
            <input type="text" size="50" maxlength="50" name="nomeCompleto"
            placeholder="Nome Completo"/>
            <div class="input-icon"><i class="fa fa-user"></i></div>
          </div>
          <div class="input-group input-group-icon">
            <input type="text" size="30" maxlength="20" name="usuario" placeholder="Usuario"/>
            <div class="input-icon"><i class="fa fa-user-circle"></i></div>
          </div>
          <div class="input-group input-group-icon">
            <input type="password" size="30" maxlength="30" id="senha1" placeholder="Senha"/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
          </div>
          <div class="input-group input-group-icon">
            <input type="password" size="30" maxlength="30" id="senha2" name="senha" placeholder="Repetir a Senha"/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
          </div>
          <div class="input-group input-group-icon">
            <input type="email" placeholder="Email" name="email" size="50" maxlength="50"/>
            <div class="input-icon"><i class="fa fa-envelope"></i></div>
          </div>
          <div class="input-group input-group-icon">
            <input type="text" placeholder="Telefone" name="telefone" size="20" maxlength="14"/>
            <div class="input-icon"><i class="fa fa-phone"></i></div>
          </div>
          <div class="input-group input-group-icon">
            <input type="text" name="cpf" placeholder="CPF" size="20" maxlength="11"/>
            <div class="input-icon"><i class="fa fa-address-card"></i></div>
          </div>
        </div>
        <!-- Select Genero -->
        <div class="form-box">
          <div class="col-half">
            <h4>Genero</h4>
            <div class="input-group">
              <input type="radio" name="genero" value="M" id="gender-male"/>
              <label for="gender-male">Masculino</label>
              <input type="radio" name="genero" value="F" id="gender-female"/>
              <label for="gender-female">Femenino</i></label>
            </div>
          </div>
        </div>
        <!-- Imagem de Perfil -->
        <div class="form-box">
          <h4>Definir Imagem de Perfil</h4>
          <div class="input-group">
            <input type="file" name="pathFile" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple />
            <label for="file"><i class="fa fa-upload"></i><span>Upload File</span></label>
          </div>
          <script type="text/javascript">
            var inputs = document.querySelectorAll( '.inputfile' );
            Array.prototype.forEach.call( inputs, function( input )
            {
              var label	 = input.nextElementSibling,
              labelVal = label.innerHTML;

              input.addEventListener( 'change', function( e )
              {
                var fileName = '';
                if( this.files && this.files.length > 1 )
                  fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else
                  fileName = e.target.value.split( '\\' ).pop();

                if( fileName )
                  label.querySelector( 'span' ).innerHTML = fileName;
                else
                  label.innerHTML = labelVal;
              });
            });
          </script>
        </div>
        <div class="form-box">
          <h4>Terms and Conditions</h4>
          <div class="input-group">
            <input type="checkbox" id="terms"/>
            <label for="terms">Eu aceito os termos e condições para se inscrever
            para este serviço, e confirmo que li a política de privacidade.</label>
          </div>
        </div>
        <br>
        <div class="form-box">
          <div class="input-group">
            <!-- <input type="button" id="enviar" name="btnEnviar" value="Cadastrar"> -->
            <button type="button" id="enviar" name="button">Cadastrar</button>
          </div>
        </div>
      </form>
      <script src="/controller/scripts/formularioScript.js" charset="utf-8"></script>
    </div>
    <?php require_once './footer.php';?>
  </div>
</body>
</html>
