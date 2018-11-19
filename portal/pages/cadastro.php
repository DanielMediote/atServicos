<?php require '../config.php'; ?>
<?php require_once HEAD; ?>
<body>
  <!-- Navigation -->
  <?php require_once(ROOT . "/_slicesHTML/navbar.php"); ?>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="card m-3 bg-light" style="width: 30rem;">
        <img class="card-img-top w-75 align-self-center" src="../img/icon/task.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Cliente</h5>
          <p class="card-text">Procure serviços de onde estiver, seja um cliente do nosso Portal de Serviços.</p>
          <center>
            <a href="cadastro/cliente" class="btn btn-primary">Registrar-se Agora</a>
          </center>
        </div>
      </div>
      <div class="card m-3 bg-light" style="width: 30rem;">
        <img class="card-img-top w-75 align-self-center" src="../img/icon/task.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Prestador</h5>
          <p class="card-text">Torne-se um prestador de serviço, facilite seu trabalho e ganhe dinheiro com isso.</p>
          <center>
            <a href="/cadastro/prestador" class="btn btn-primary">Registrar-se Agora</a>
          </center>
        </div>
      </div>
    </div>
  </div>
<?php include_once(ROOT . '/_slicesHTML/footer.php'); ?>
</body>
</html>
