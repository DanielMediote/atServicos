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
    <script src="../js/jquery.mask.js" charset="utf-8"></script>
  </head>
  <body>
    <!-- Navigation -->
    <?php
    $pessoa = new Pessoa();
    $cliente = new Cliente();
    $prestador = new Prestador();
    $admin = new Administrador();
    switch ($_SESSION['ocupacao']) {
      case 'Cliente':
      $dataRes = $cliente->showCliente($_SESSION['id']);
      break;
      case 'Prestador':
      $dataRes = $prestador->showPrestador($_SESSION['id']);
      break;
      case 'Administrador':
      $dataRes = $admin->showAdmin($_SESSION['id']);
      break;
      default:
      $dataRes = null;
      break;
    }
    ?>
    <?php include_once(ROOT.'/_slicesHTML/navigation.php');?>
    <div class="perfil">
      <section class="profile-container row">
        <div class="profile-header col m3 s12">
          <div class="image">
            <?php
            $srcImage;
            if($_SESSION['foto'] == NULL){
              $srcImage = "../img/semfoto.jpg";
            }else{
              $srcImage = "data:image/jpeg;base64,".$_SESSION['foto'];
            }
            ?>
            <img src="<?=$srcImage?>" alt=""/>
          </div>
          <div class="profile-information">
          </div>
        </div>
        <div class="profile-content col m9 s12">
          <table id="tabela" class="table-content">
            <?php foreach ($dataRes as $keyPerfil => $valuePerfil): ?>
              <?php if ($keyPerfil == 'Estado'): ?>
                <tr>
                  <th><?=$keyPerfil?></th>
                  <td>
                    <?php
                    $listaEstado = new $keyPerfil();
                    $regioesBr = array('Norte','Sul','Centro-Oeste', 'Sudeste', 'Nordeste');
                    ?>
                    <select class="campo" id="estado" name="Estado" disabled onchange="loadCidades()">
                      <option value="" selected hidden=""><?=$valuePerfil?></option>
                      <?php foreach ($regioesBr as $key => $regiao): ?>
                        <optgroup label="<?=$regiao?>">
                          <?php foreach ($listaEstado->readPerRegion($regiao) as $keyEstado => $value): ?>
                            <option value="<?=$value['id']?>"><?=$value['nome']?></option>
                          <?php endforeach; ?>
                        <?php endforeach; ?>
                      </optgroup>
                    </select>
                  </td>
                </tr>
              <?php elseif($keyPerfil == 'Cidade'): ?>
                <tr>
                  <th><?=$keyPerfil?></th>
                  <td>
                    <select id="cidade" class="campo" name="<?=$keyPerfil?>" disabled>
                      <option value="" selected><?=$valuePerfil?></option>
                    </select>
                  </td>
                </tr>
              <?php else: ?>
                <tr>
                  <th><?=$keyPerfil?></th>
                  <td>
                      <input class="campo" type="text" name="<?=$keyPerfil?>" value="<?=$valuePerfil?>" disabled>
                  </td>
                </tr>
              <?php endif; ?>
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
