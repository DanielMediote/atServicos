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
    <?php endif; ?>
    <li class='sub-menu'>
      <a>Explorar <i class='fa fa-angle-down'></i></a>
      <ul>
        <li><a href='/cadastro'>Cadastro</a></li>
        <li><a href='/administradores'>Administradores</a></li>
        <li><a href='/clientes'>Clientes</a></li>
        <li><a href='/prestadores'>Prestadores</a></li>
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
          </div>
          <h3 class="name"><?=$_SESSION['pes_nome']?></h3>
          <h4 class="role">Software Developer</h4>
          <h5 class="nick"><?=$_SESSION['pes_email']?></h5>
        </div>
      </div>
    </div>
    <div class="menu-body">
      <nav class='side-nav animated bounceInDown'>
        <ul>
          <li class='sub-menu'><a href='#settings'><div class='fa fa-user'></div>Usuario<div class='fa fa-angle-down right'></div></a>
            <ul>
              <li><a href='/perfil'>Perfil</a></li>
              <li><a href='/contatos'>Contatos</a></li>
              <li><a href='/servicosPerfil'>Serviços</a></li>
              <li><a href='/notificacoes'>Notas</a></li>
            </ul>
          </li>
          <li>
            <a href='/perfil'><div class='fa fa-cog'></div>Configurações</a>
          </li>
          <li>
            <a href='#message'><div class='fa fa-envelope'></div>Notificaçoes<span class='badge right'>12</span></a>
          </li>
          <li class='sub-menu'>
            <a href='#message'>
              <div class='fa fa-question-circle'></div>Ajuda<div class='fa fa-caret-down right'></div>
            </a>
            <ul>
              <li><a href='#settings'>FAQ's</a></li>
              <li><a href='#settings'>Reportar Bug</a></li>
              <li><a href='#settings'>Forum</a></li>
            </ul>
          </li>
          <li>
            <a id="logoffPessoa" style="cursor: pointer;">
              <div class='fa fa-sign-out-alt'></div>Logout
            </a>
          </li>
        </ul>
      </nav>
    </div>
  <?php endif; ?>
</div>


<script src="../js/navigationScript.js" charset="utf-8"></script>
