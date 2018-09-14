<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
</head>
<body>
  <link rel='stylesheet' href='../css/preloader.css'>
  <div id="pagina">
    <div class="background">
    </div>
    <div class="login-conteiner">
      <form class="form-login" action="../index.php" method="post">
        <div class="input-group">
          <label for="user">Usuário</label>
          <div>
            <input type="text" id="usuario" name="usuario" value=""
            placeholder="Digite seu usuário ou e-mail.">
            <i class="material-icons" id="userIcon">account_box</i>
          </div>
        </div>
        <div class="input-group">
          <label for="pass">Senha</label>
          <div >
            <input id="passInput" type="password" name="senha" value="" placeholder="Digite sua senha.">
            <i class="material-icons" id="passIcon" onclick="alterar()" title="Mostrar">visibility</i>
          </div>
        </div>

        <div class="input-group">
          <a href="#">Esqueceu a senha ?</a>
          <a href="./cadastro.php">Cadastre-se agora mesmo.</a>
        </div>
        <div class="input-group">
          <button class="btn-login" type="submit" name="button">Log in
            <span class='line-1'></span>
            <span class='line-2'></span>
            <span class='line-3'></span>
            <span class='line-4'></span>
          </button>
        </div>
        <div class="input-group">
          <a href="../index.php" class="voltar"><i class="material-icons">home</i></a>
        </div>
        <script type="text/javascript">
        // $('#usuario').focusout(function() {
        //   var user = document.getElementById('usuario').value;
        //   var icone = document.getElementById('userIcon');
        //   $.ajax({
        //     url: '../classes/verificacaoLogin.php',
        //     type: 'POST',
        //     data: {user:user},
        //     success: function(res) {
        //       if (user=='') {
        //         icone.style.color = 'black';
        //       }else {
        //         if (res=='True') {
        //           icone.style.color = 'green';
        //         } else {
        //           icone.style.color = 'red';
        //         }
        //       }
        //     },
        //     error:function() {
        //       alert('erro')
        //     }
        //   })
        // });

        function alterar(){
          var icon = document.getElementById('passIcon');
          var passInput = document.getElementById('passInput');
          if (passInput.type === 'password') {
            passInput.type = 'text';
            icon.innerHTML = "visibility_off";
            icon.title = 'Ocultar';
          }else {
            passInput.type = "password";
            icon.innerHTML = "visibility";
            icon.title = 'Mostar';
          }
        }
        </script>
      </form>
    </div>
  </div>
</body>
</html>
