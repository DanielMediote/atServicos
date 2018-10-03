<link rel="stylesheet" href="../css/navigation.css">
<nav class='main-nav animated flipInX'>
  <ul>
    <?php if ($_SESSION['status']): ?>
      <li><a id="toggleMenu"><div class='fa fa-align-left'></div></a></li>
    <?php endif; ?>
    <li><a href='/home'><div class='fa fa-home'></div></a></li>
    <?php if ($_SESSION['status']): ?>
    <?php else: ?>
      <li><a id="open-modal">Login</a></li>
    <?php endif;?>
    <li class='sub-menu'>
      <a>Explorar <i class='fa fa-angle-down'></i></a>
      <ul>
        <?php if (!$_SESSION['status']): ?>
          <li><a href='/cadastrarCliente'>Seja um Cliente</a></li>
        <?php endif; ?>
        <?php if ($_SESSION['ocupacao']=="Administrador"): ?>
          <li><a href='/cadastrarPrestador'>Adicionar Prestador</a></li>
          <li><a href='/novoServico'>Adicionar Servico</a></li>
        <?php endif;?>
        <li><a href='/pessoas'>Lista de Membros</a></li>
      </ul>
    </li>
    <li class='sub-menu'>
      <a>Portal de Serviços <i class='fa fa-angle-down'></i></a>
      <ul>
        <li><a href='#'>Categorias</a></li>
        <li><a href='#'>Beneficios</a></li>
        <li><a href='#'>Avaliação</a></li>
      </ul>
    </li>
  </ul>
  <div class="status-display">
    <?php if ($_SESSION['status']): ?>
      <div class="circle green">
      </div>
      <p>
        Online
      </p>
    <?php else: ?>
      <div class="circle red">
      </div>
      <p>
        Offline
      </p>
    <?php endif; ?>
  </div>
</nav>




<div class="overlay hidden"></div>

<!-- Tela de Login -->

<div class="modal fade hidden" id="login-modal" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="loginmodal-container">
      <button class="btn-close-modal" type="button" id="close-modal"><i class="fas fa-times"></i></button>
      <h1>Login</h1><br>
      <input class="input-login" id="userLogin" type="text" name="username" placeholder="Username">
      <input class="input-login" id="passLogin" type="password" name="password" placeholder="Password">
      <input type="submit" name="" id="logarPessoa" class="login loginmodal-submit submit-login" value="Login">
      <div class="login-help">
        <a href="#">Register</a> - <a href="#">Forgot Password</a>
      </div>
    </div>
  </div>
</div>


<!-- barra de navegação lateral -->

<div class="user-menu">
  <?php if ($_SESSION['status']): ?>
    <div class="menu-header">
      <div class="container">
        <div class="profile-card">
          <div class="avatar">
            <img src="data:image/jpeg;base64,<?=$_SESSION['foto']?>" alt="">
          </div>
          <h3 class="name"><?=$_SESSION['nome']?></h3>
          <h4 class="role"><?=$_SESSION['ocupacao']?></h4>
          <h5 class="nick"><?=$_SESSION['email']?></h5>
        </div>
      </div>
    </div>
    <div class="menu-body">
      <nav class='side-nav animated bounceInDown'>
        <ul>
          <li class='sub-menu'>
            <a href='#perfil'>
              <div class='fa fa-user'></div>Usuario<div class='fa fa-angle-down right'></div>
            </a>
            <ul>
              <li><a href='/perfil'>Perfil</a></li>
              <li><a href='/contatos'>Contatos</a></li>
              <li><a href='/notificacoes'>Notas</a></li>
            </ul>
          </li>
          <li>
            <a href='/perfil'><div class='fa fa-cog'></div>Configurações</a>
          </li>
          <li>
            <a href=''><div class='fa fa-envelope'></div>Notificaçoes<span class='badge right'>12</span></a>
          </li>
          <?php if ($_SESSION['ocupacao']!="Administrador"): ?>
            <li class='sub-menu'>
              <a href="#ajuda">
                <div class='fa fa-question-circle'></div>Ajuda<div class='fa fa-caret-down right'></div>
              </a>
              <ul>
                <li><a href='/faq'>FAQ's</a></li>
                <li><a href='/reportbug'>Reportar Bug</a></li>
                <li><a href='/forum'>Forum</a></li>
              </ul>
            </li>
            <li>
          <?php endif; ?>
            <a id="logoffPessoa" style="cursor: pointer;" href="/home">
              <div class='fa fa-sign-out-alt'></div>Logout
            </a>
          </li>
        </ul>
      </nav>
    </div>
  <?php endif; ?>
</div>


<script src="../js/navigationScript.js" charset="utf-8"></script>
