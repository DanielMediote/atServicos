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
          <h5 class="modal-title" id="loginModal">LOGIN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="usuario">Usuário</label>
              <input type="email" class="form-control" id="usuario" aria-describedby="emailHelp" placeholder="Usuario como Cliente">
            </div>
            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="password" class="form-control" id="senha" placeholder="Senha">
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Mantenha-me Conectado</label>
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
            <strong>Gestor de Serviços Online</strong>
          </h1>
          <hr>
        </div>
        <div class="col-lg-8 mx-auto">
          <p class="text-faded mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Como Funciona ?</a>
        </div>
      </div>
    </div>
  </header>

  <section class="bg-primary" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="section-heading text-white">Trabalhando com Gestão de Serviços !</h2>
          <hr class="light my-4">
          <p class="text-faded mb-4">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="#comecar">Começar Agora</a>
        </div>
      </div>
    </div>
  </section>

  <section id="comecar">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">Gestor de Serviços</h2>
          <hr class="my-4">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-chalkboard-teacher text-primary mb-3 sr-icon-1"></i>
            <h3 class="mb-3">Tecnologia</h3>
            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-comment-dollar text-primary mb-3 sr-icon-2"></i>
            <h3 class="mb-3">Produtividade</h3>
            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-code text-primary mb-3 sr-icon-3"></i>
            <h3 class="mb-3">Aplicação</h3>
            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-chart-line text-primary mb-3 sr-icon-4"></i>
            <h3 class="mb-3">Resultados</h3>
            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-0" id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters popup-gallery">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="portfolio-box-caption-content">
                <div class="project-category text-faded">
                  Category
                </div>
                <div class="project-name">
                  Project Name
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="portfolio-box-caption-content">
                <div class="project-category text-faded">
                  Category
                </div>
                <div class="project-name">
                  Project Name
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="portfolio-box-caption-content">
                <div class="project-category text-faded">
                  Category
                </div>
                <div class="project-name">
                  Project Name
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="portfolio-box-caption-content">
                <div class="project-category text-faded">
                  Category
                </div>
                <div class="project-name">
                  Project Name
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="portfolio-box-caption-content">
                <div class="project-category text-faded">
                  Category
                </div>
                <div class="project-name">
                  Project Name
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="portfolio-box-caption-content">
                <div class="project-category text-faded">
                  Category
                </div>
                <div class="project-name">
                  Project Name
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
<!-- 
  <section class="bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
      <a class="btn btn-light btn-xl sr-button" href="http://startbootstrap.com/template-overviews/creative/">Download Now!</a>
    </div>
  </section> -->

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="section-heading">Programadores</h2>
          <hr class="my-4">
          <p class="mb-5">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 text-center">
          <div class='card card-profile text-center'>
            <img alt='' class='card-img-top' src='img/header2.jpg'>
            <div class='card-block'>
              <img width="200" alt='' class='card-img-profile' src='img/user.jpg'>
              <h4 class='card-title'>
                Fulano de Tal
                <small>Front-end designer</small>
              </h4>
              <div class='card-links'>
                <i class='fab fa-2x fa-github' href='#'></i>
                <i class='fab fa-2x fa-twitter' href='#'></i>
                <i class='fab fa-2x fa-facebook-f' href='#'></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-center">
          <div class='card card-profile text-center'>
            <img alt='' class='card-img-top' src='img/header2.jpg'>
            <div class='card-block'>
              <img width="200" alt='' class='card-img-profile' src='img/user.jpg'>
              <h4 class='card-title'>
                Fulano de Tal
                <small>Front-end designer</small>
              </h4>
              <div class='card-links'>
                <i class='fab fa-2x fa-github' href='#'></i>
                <i class='fab fa-2x fa-twitter' href='#'></i>
                <i class='fab fa-2x fa-facebook-f' href='#'></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 ml-auto text-center">
          <div class='card card-profile text-center'>
            <img alt='' class='card-img-top' src='img/header2.jpg'>
            <div class='card-block'>
              <img width="200" alt='' class='card-img-profile' src='img/user.jpg'>
              <h4 class='card-title'>
                Fulano de Tal
                <small>Front-end designer</small>
              </h4>
              <div class='card-links'>
                <i class='fab fa-2x fa-github' href='#'></i>
                <i class='fab fa-2x fa-twitter' href='#'></i>
                <i class='fab fa-2x fa-facebook-f' href='#'></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

  </html>
