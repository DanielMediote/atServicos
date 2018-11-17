<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<a id="logo" class="navbar-brand" href="/home">
  <img src="/img/servicos.png" width="65" alt="">
  OnServices
</a>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="/home">Início<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/servicos">FAQ<span class="sr-only">(current)</span></a>
    </li>
    <?php if ($_SESSION['status']): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Explorar
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/conta/perfil">Meu Perfil</a>
          <?php if ($_SESSION['ocupacao'] == "Prestador"): ?>
            <a class="dropdown-item" href="#">Pedidos</a>
          <?php else: ?>
            <a class="dropdown-item" href="/servicos">Contratar Serviço</a>
          <?php endif; ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Ajuda</a>
        </div>
      </li>
    <?php endif; ?>
  </ul>
</div>
<?php if (!isset($_SESSION['status'])): ?>
  <form class="form-inline my-2 my-lg-0 formulario" id="form_login">
    <input class="form-control mr-sm-2" type="text" placeholder="Login" name="user">
    <input class="form-control mr-sm-2" type="password" placeholder="Senha" name="pass">
    <a class="btn text-dark my-2 my-sm-0 mr-2" href="/cadastro">Sign Up</a>
    <button class="btn btn-dark my-2 my-sm-0" type="button" id="login_btn">Log In</button>
  </form>
<?php else: ?>
  <div class="figure mr-2">
    <img class="rounded-circle" src="data:image/png;base64,<?=$_SESSION['foto']?>" alt="" width="60" height="60">
  </div>
  <div class="nav-item text-dark">
    <small>
      <p class="mr-3 mb-0 font-weight-bold"><?=$_SESSION['nome']?></p>
      <p class="mr-3 mb-0 font-italic"><?=$_SESSION['email']?></p>
      <p class="mr-3 mb-0 font-italic"><?=$_SESSION['ocupacao']?></p>
    </small>
  </div>
  <button class="btn btn-dark my-3 my-sm-0" type="button" id="log_out">Log Out</button>
<?php endif; ?>
</nav>
