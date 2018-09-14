<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/cadastro.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
</head>
<body>
  <link rel='stylesheet' href='../css/preloader.css'>
  <div id="pagina">
    <?php include_once './navBar.php'; ?>
    <div class="wrapper">
      <div class="header">
        <div class="logo-texto">
          <div id="table">
            <div id="centeralign">
              <!-- <h1 class="title">Sign Up</h1> -->
              <p class="subtitle">Lorem ipsum dolor sit amet.</div>
              </div>
              <!-- <script src="../scripts/scriptsAnimation.js" charset="utf-8"></script> -->
            </div>
          </div>
          <?php
          
          
          function __autoload($classe)
          {
            include_once "../classes/{$classe}.class.php";
          }

          if (filter_has_var(INPUT_POST, 'btnEnviar')) {
            $pessoa = new Pessoa();
          }

          ?>          
          <div class="form-conteiner">
            <form method="post">
              <div class="input-group">
                <label for="Nome">Nome</label>
                <input type="text" name="nome" value="" size="70" maxlength="50">
              </div>
              <div class="input-group">
                <label for="Senha">Senha</label>
                <input type="password" name="senha" value="" size="30" maxlength="15">
              </div>
              <div class="input-group">
                <label for="Nome">E-mail</label>
                <input type="email" name="nome" value="" size="70" maxlength="50" placeholder="ex: seunome@hotmail.com">
              </div>
              <div class="input-group">
                <label for="Senha">CPF</label>
                <input type="text" name="senha" value="" size="15" maxlength="11"
                placeholder="000.000.000-00">
              </div>
              <br>
              <div class="buttons-group">
                <button class="buttom-submit" type="submit" name="btnEnviar">Enviar
                  <span class='line-1'></span>
                  <span class='line-2'></span>
                  <span class='line-3'></span>
                  <span class='line-4'></span>
                </button>
                <button class="buttom-clear" type="reset" name="button">Limpar
                  <span class='line-1'></span>
                  <span class='line-2'></span>
                  <span class='line-3'></span>
                  <span class='line-4'></span>
                </button>
              </div>
            </form>
          </div>
        </div>
        <?php require_once './footer.php'; ?>
      </div>
    </body>
    </html>
