<?php require '../config.php'; ?>
<?php if (!$_SESSION['status']): header('Location: '.HOST)?>
<?php else: ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon/settings.png" type="image/svg+xml"/>
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  </head>
  <body>
    <!-- Navigation -->
    <?php include_once(ROOT.'/_slicesHTML/navigation.php');?>
    <div class="perfil">
      <section class="profile-container row">
        <div class="profile-header col m3 s12">
          <div class="image">
            <img src="../img/avatar.png" alt="" />
          </div>
          <div class="profile-information">

          </div>
        </div>
        <div class="profile-content col m9 s12">
          <?php
          $cliente = new Cliente();
          $prestador = new Prestador();
          $admin = new Administrador();
          if ($_SESSION['ocupacao'] == "Cliente") {
            $dataResponse = $cliente->readOne($_SESSION['email']);
          }elseif ($_SESSION['ocupacao'] == "Prestador") {
            $dataResponse = $prestador->readOne($_SESSION['email']);
          }else {
            $dataResponse = $admin->readOne($_SESSION['email']);
          }

          $nomes = array('nome','usuario','email','telefone', 'cpf', 'cidade', 'estado');
          $i = 0;
          ?>
          <table id="tabela" class="table-content">
            <?php foreach ($dataResponse as $key => $tupla): ?>
              <?php foreach ($tupla as $campo => $value):?>
                <tr>
                  <th><?=$campo?></th>
                  <td><input class="campo" type="text" name="<?=$nomes[$i]?>" value="<?=$value?>" disabled></td>
                </tr>
                <?php $i++; endforeach; ?>
              <?php endforeach; ?>
            </table>
          </div>
          <form class="botoesPerfil" method="post">
            <button id="tornarAdmin" type="button" name="button" hidden>Tornar-se Admin</button>
            <button id="deletarConta" type="button" name="button">Deletar Conta</button>
            <button id="habilitar" type="button" name="button">Habilitar Edição</button>
            <button id='atualizarDados' type='button' name='button'>Atualizar Dados</button>
          </form>
        </section>
      </div>
      <script src="../js/perfilScript.js" charset="utf-8"></script>
    </body>
    </html>
  <?php endif; ?>
