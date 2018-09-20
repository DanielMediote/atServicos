<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Services Manager</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/creative.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Services Manager</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/servicos">Serviços</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/prestadores">Pretadores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cadastro">Sing Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Log in</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="loginModal">LOGIN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label class="color-primary" for="usuario">Usuário</label>
              <input type="email" class="form-control" id="usuario" aria-describedby="emailHelp" placeholder="">
            </div>
            <div class="form-group">
              <label class="color-primary" for="senha">Senha</label>
              <input type="password" class="form-control" id="senha" placeholder="">
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label color-primary" for="exampleCheck1">Mantenha-me Conectado</label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Logar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h1 class="text-uppercase">
            <strong>Seja um Cliente</strong>
          </h1>
          <hr>
        </div>
        <div class="col-lg-8 mx-auto">
          <!-- <p class="text-faded mb-5"></p> -->
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#cadastro">
           <i class="fas fa-arrow-down"></i>
         </a>
       </div>
     </div>
   </div>
 </header>

 <section class="bg-light" id="cadastro">

  <div class="formulario">
    <form>
      <div class="row">
        <h4>Informações Básicas</h4>
        <div class="input-group input-group-icon">
          <input type="text" name="nome" placeholder="Nome Completo"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="text" name="usuario" placeholder="Usuario"/>
          <div class="input-icon"><i class="fa fa-user-circle"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="password" name="senha" placeholder="Password"/>
          <div class="input-icon"><i class="fa fa-key"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="text" name="cpf" placeholder="CPF"/>
          <div class="input-icon"><i class="fa fa-address-card"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="email" name="email" placeholder="Email"/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="date" name="data" value="<?=date("Y-m-d")?>"/>
          <div class="input-icon"><i class="fa fa-calendar-alt"></i></div>
        </div>
      </div>
      <div class="row">
        <div class="input-group input-group-icon">
          <input type="text" placeholder="Card Number"/>
          <div class="input-icon"><i class="fa fa-credit-card"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="text" placeholder="Card CVC"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
      </div>
    </div>
    <div class="row">
      <h4>Termos de Condições</h4>
      <div class="input-group">
        <input type="checkbox" id="terms"/>
        <label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
      </div>
    </div>
    <div class="row">
      <input type="button" id="enviar" value="Enviar">
    </div>
  </form>
</div>
</section>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<<script src="js/formularioScript.js"></script>
<script src="vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/creative.min.js"></script>

</body>

</html>
