<?php require 'config.php'; ?>
<?php  require_once HEAD;?>
<body id="body">
  <!-- Navigation -->
  <?php include_once(ROOT . '/_slicesHTML/navbar.php');?>

  <div id="slideshow" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#slideshow" data-slide-to="0" class="active"></li>
      <li data-target="#slideshow" data-slide-to="1"></li>
      <li data-target="#slideshow" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="/img/carrousel03.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>Utilidades</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/img/carrousel02.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>Facilidade de Acesso</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/img/carrousel01.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>Serviço Online</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#slideshow" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#slideshow" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <?php include_once(ROOT . '/_slicesHTML/footer.php'); ?>

</body>
</html>
