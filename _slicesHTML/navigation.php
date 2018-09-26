<link rel="stylesheet" href="../css/navigation.css">
<nav class='main-nav animated flipInX'>
  <ul>
    <?php if ($_SESSION['logado']): ?>
      <li><a id="toggleMenu"><div class='fa fa-align-left'></div></a></li>
    <?php endif; ?>
    <li><a href='/home'><div class='fa fa-home'></div></a></li>
    <?php if ($_SESSION['logado']): ?>
    <?php else: ?>
      <li><a id="login">Login</a></li>
    <?php endif; ?>
    <li class='sub-menu'>
      <a>Explorar <i class='fa fa-angle-down'></i></a>
      <ul>
        <li><a href='#'>Servicos</a></li>
        <li><a href='#'>Prestadores</a></li>
        <li><a href='#'>Clientes</a></li>
      </ul>
    </li>
    <li class='sub-menu'>
      <a>Serviços <i class='fa fa-angle-down'></i></a>
      <ul>
        <li><a href='#'>Por Categoria</a></li>
        <li><a href='#'>Por Custo</a></li>
        <li><a href='#'>Por Avaliação</a></li>
      </ul>
    </li>
    <li><a href='/cadastro'>Cadastro</a></li>
  </ul>
</nav>




<div class="overlay hidden"></div>

<!-- Tela de Login -->

<div class="modal fade hidden" id="login-modal" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="loginmodal-container">
      <button class="btn-close-modal" type="button" id="close-modal"><i class="fas fa-times"></i></button>
      <h1>Login</h1><br>
      <form action="/home" method="post">
        <input type="text" name="user" placeholder="Username">
        <input type="password" name="pass" placeholder="Password">
        <input type="submit" name="logar" class="login loginmodal-submit" value="Login">
      </form>
      <div class="login-help">
        <a href="#">Register</a> - <a href="#">Forgot Password</a>
      </div>
    </div>
  </div>
</div>








<!-- barra de navegação lateral -->

<div class="user-menu">
  <?php if ($_SESSION['logado']): ?>
    <div class="menu-header">
      <div class="container">
        <div class="profile-card">
          <div class="avatar">
          </div>
          <h3 class="name">Username</h3>
          <h4 class="role">Software Developer</h4>
          <h5 class="nick">@useremail</h5>
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
              <li><a href='#settings'>Reportar Erro</a></li>
              <li><a href='#settings'>Forum</a></li>
            </ul>
          </li>
          <li>
            <form class="" action="/home" method="post">
              <a href="#">
                <div class='fa fa-sign-out-alt'></div>
                <button type="submit" name="logoff">Logout</button>
              </a>
            </form>
          </li>
        </ul>
      </nav>
    </div>
  <?php endif; ?>
</div>


<script src="../js/navigationScript.js" charset="utf-8"></script>
