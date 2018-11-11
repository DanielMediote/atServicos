<?php require '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once LINKS; ?>
</head>
<body>
  <!-- Navigation -->
  <?php include_once(ROOT.'/_slicesHTML/navbar.php');?>
  <?php if (isset($_SESSION['status'])): ?>
    <div class="fixed-bottom mb-5 text-center">
      <a class="btn btn-muted" href="/conta/configuracao">
        <h2>
          Ir para pagina de Perfil
          <i class="fas fa-user-alt"></i>
        </h2>
      </a>
    </div>
  <?php else: ?>
    <div class="container px-2 mt-4">
      <h3 class="title">Registro de Cliente</h3>
      <!-- Formulário -->
      <form class="mb-5 mt-5 formulario">
        <div class="form-row">
          <div class="form-group col-md-5">
            <label for="">Nome Completo *</label>
            <input type="email" class="form-control" name="nome">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="">Usuario *</label>
            <input type="text" class="form-control" name="usuario">
          </div>
          <div class="form-group col-md-4">
            <label for="">Senha *</label>
            <input type="password" class="form-control" name="senha">
          </div>
          <div class="form-group col-md-5">
            <label for="">E-mail *</label>
            <input type="text" class="form-control" name="email">
          </div>
        </div>
        <div class="form-group">
          <label for="">Genero</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="genero" id="masculino" value="M" checked>
            <label class="form-check-label" for="masculino">
              Masculino
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="genero" id="famenino" value="F">
            <label class="form-check-label" for="famenino">
              Femenino
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="genero" id="outro" value="O">
            <label class="form-check-label" for="outro">
              Outro
            </label>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="">Telefone *</label>
            <input type="text" class="form-control" name="telefone">
          </div>
          <div class="form-group col-md-3">
            <label for="">CPF (opcional)</label>
            <input type="text" class="form-control" name="cpf">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="">Foto (opcional)</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="file">
                <label class="custom-file-label" for="file"></label>
              </div>
            </div>
          </div>
        </div>
        <?php
        $estado = new Estado();
        $brasil = array('Norte','Sul','Centro-Oeste', 'Sudeste', 'Nordeste');
        ?>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="">Estado</label>
            <select id="estado" class="form-control" onchange="loadCidades()" name="estado_id">
              <option value="0" selected>Selecionar...</option>
              <?php foreach ($brasil as $key => $regiao): ?>
                <optgroup label="<?=$regiao?>">
                  <?php foreach ($estado->readPerRegion($regiao) as $key => $tupla): ?>
                    <option value="<?=$tupla['id']?>"><?=$tupla['nome'];?></option>
                  <?php endforeach; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="">Estado</label>
              <select id="cidade" class="form-control" name="cidade_id">
                <option value="0" selected>Selecionar...</option>
                <option>...</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="termos" onclick="check_termos()">
              <label class="form-check-label" for="termos">
                Li e Concordo com a <a href="#termos">Termos de Uso</a>.
              </label>
            </div>
          </div>
          <button type="button" class="btn btn-success disabled" id="btn_enviar">Cadastrar</button>
          <button type="reset" class="btn btn-warning">Limpar Dados</button>
        </form>
      </div>
    <?php endif; ?>
    <?php include_once(ROOT.'/_slicesHTML/footer.php'); ?>
  </body>
  </html>
