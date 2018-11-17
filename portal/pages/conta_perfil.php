<?php require '../config.php';?>
<?php require_once HEAD;?>
<body>
  <!-- Navigation -->
  <?php include_once ROOT . '/_slicesHTML/navbar.php';?>
  <?php if (isset($_SESSION['status'])): ?>
    <div class="grid m-5">
      <div class="row">
        <div class="col-3">
          <div class="nav flex-column nav-pills bg-light" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link btn-outline-secondary active" id="profile-tab" data-toggle="pill" href="#profile-painel" role="tab" aria-controls="profile-tab" aria-selected="true">Perfil</a>
            <?php if ($_SESSION['ocupacao'] == "Prestador"): ?>
              <a class="nav-link btn-outline-secondary" id="services-tab" data-toggle="pill" href="#services-painel" role="tab" aria-controls="services-tab" aria-selected="false">Meus Serviços</a>
              <a class="nav-link btn-outline-secondary" id="addservices-tab" data-toggle="pill" href="#addservices-painel" role="tab" aria-controls="addservices-tab" aria-selected="false">Adicionar um Serviços</a>
              <a class="nav-link btn-outline-secondary" id="contratos-realizados-tab" data-toggle="pill" href="#contratos-realizados-painel" role="tab" aria-controls="v-pills-messages" aria-selected="false">Contratos Realizados</a>
            <?php else: ?>
              <a class="nav-link btn-outline-secondary" id="services-tab" data-toggle="pill" href="#services-painel" role="tab" aria-controls="services-tab" aria-selected="false">Meus Contratos</a>
            <?php endif;?>
            <a class="nav-link btn-outline-secondary" id="messages-tab" data-toggle="pill" href="#messages-painel" role="tab" aria-controls="v-pills-messages" aria-selected="false">Menssagens</a>
            <a class="nav-link btn-outline-secondary" id="setthings-tab" data-toggle="pill" href="#setthings-painel" role="tab" aria-controls="v-pills-setthings" aria-selected="false">Alterar Dados</a>
          </div>
        </div>
        <?php
        $prestador = new Prestador();
        $cliente = new Cliente();
        $servico = new Servico();
        $contrato = new Contrato();
        switch ($_SESSION['ocupacao']) {
          case 'Prestador':
          $bean = $prestador->showPrestador($_SESSION["id"]);
          $id_prest = $prestador->searchCampoByValor('id_pessoa',$_SESSION['id'],'id');
          break;
          case 'Cliente':
          $bean = $cliente->showCliente($_SESSION["id"]);
          $id_cliente = $cliente->searchCampoByValor('id_pessoa', $_SESSION['id'], 'id');
          break;
        }
        ?>
        <div class="col-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="profile-painel" role="tab-painel-1" aria-labelledby="profile-tab">
              <div class="grid rounded bg-light">
                <div class="row">
                  <div class="figure m-4">
                    <img class="rounded" src="data:image/png;base64,<?=$_SESSION['foto']?>" alt="" width="200" >
                  </div>
                </div>
                <?php foreach ($bean as $key => $value): ?>
                  <div class="row m-4">
                    <div class="col-2">
                      <p class="text-info "><?php
                      if ($key == "cpnj" || $key == "cpf") {
                        echo strtoupper($key);
                      }else {
                        echo ucfirst($key);
                      }
                      ?>
                    </p>
                  </div>
                  <div class="col ml-4">
                    <p class=""><?=$value?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="tab-pane fade" id="services-painel" role="tab-painel-2" aria-labelledby="services-tab">
            <?php if ($_SESSION['ocupacao'] == "Prestador"):
              $prestador_servicos = $servico->listarServicoPorPrestador($id_prest);
              ?>
              <div class="grid bg-light p-4">
                <h3>Meus Serviços</h3>
                <?php if (count($prestador_servicos) < 1): ?>
                  <div class="row alert alert-warning" role="alert">
                    Você ainda não esta prestando nenhum tipo de Serviço!
                  </div>
                  <div class="row alert alert-info" role="alert">
                    Vocẽ pode adicionar um Serviço clickando na aba de "Adcionar um Serviço".
                  </div>
                <?php else: ?>
                  <table class="table table-hover table-striped">
                    <thead>
                      <th>Código</th>
                      <th>Nome</th>
                      <th>Categoria</th>
                      <th>Preço</th>
                      <th>Descrição</th>
                    </thead>
                    <tbody>
                      <?php foreach ($prestador_servicos as $row => $tupla): ?>
                        <tr class="servico">
                          <td name="id_servico"><?=$tupla['id']?></td>
                          <td><?=$tupla['nome']?></td>
                          <td><?=$tupla['categoria']?></td>
                          <td>R$<?=$tupla['custo']?></td>
                          <td><?=$tupla['descricao']?></td>
                          <td>
                            <button class="btn btn-warning" type="button" name="servico_delete">Deletar Serviço</button>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php endif; ?>
              </div>
            <?php else: ?>
              <div class="grid bg-light p-4">
                <h1>Meus Contratos</h1>
                <table class="table table-hovered">
                  <thead>
                    <th>Código</th>
                    <th>Serviço</th>
                    <th>Custo</th>
                    <th>Prestador</th>
                    <th>Telefone</th>
                  </thead>
                  <tbody>

                    <?php foreach ($contrato->listaCotrantratosPorCliente($id_cliente) as $row => $tupla): ?>
                      <tr class="contrato">
                        <td name="id_contrato"><?=$tupla['id']?></td>
                        <td><?=$tupla['servico_nome']?></td>
                        <td><?=$tupla['servico_custo']?></td>
                        <td><?=$tupla['prestador_nome']?></td>
                        <td><?=$tupla['prestador_telefone']?></td>
                        <td>
                          <button class="btn btn-warning" type="button" name="contrato_delete">Cancelar Contrato</button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            <?php endif; ?>
          </div>
          <?php if ($_SESSION['ocupacao']=="Prestador"): ?>
            <div class="tab-pane fade" id="addservices-painel" role="tab-painel-3" aria-labelledby="addservices-tab">
              <form class="formulario" action="index.html" method="post">
                <div class="grid p-4 bg-light">
                  <legend class="legend mb-4">Registro de Serviços</legend>
                  <div class="row">
                    <div class="col-3">
                      <label for="">Nome do Serviço</label>
                    </div>
                    <div class="input-group input-group-sm mb-4 col-6 input-row">
                      <input class="form-control" type="text" name="nome" value="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                      <label for="">Categoria</label>
                    </div>
                    <?php
                    $categoria = array('Assistência','Tecnologia e Segurança','Comunicações','Indústria e Comércio','Turismo');
                    ?>
                    <div class="input-group input-group-sm mb-4 col-6 input-row">
                      <select class="custom-select" name="categoria">
                        <option seleted value="Sem Categoria">Selecionar...</option>
                        <?php foreach ($categoria as $key => $value): ?>
                          <option value="<?=$value?>"><?=$value?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                      <label for="">Descrição</label>
                    </div>
                    <div class="input-group input-group-sm mb-4 col-6 input-row">
                      <textarea class="form-control" name="descricao" rows="8" cols="80"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                      <label for="">Preço</label>
                    </div>
                    <div class="input-group input-group-sm mb-4 col-6 input-row">
                      <input class="form-control money" type="text" name="custo" >
                    </div>
                  </div>
                  <div class="row">
                    <button class="btn btn-primary" type="button" name="button" id="add_servico">Adicionar</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="contratos-realizados-painel" role="tab-painel-3" aria-labelledby="contratos-realizados-tab">
              <div class="grid p-5 bg-light">
                <?php
                $lista_contratos_realizados = $contrato->listarContratosDoClientePorPrestador($id_prest);
                ?>
                <?php if (count($lista_contratos_realizados) > 0): ?>
                  <h3>Serviços Contratados</h3>
                  <table class="table table-hover table-bordered table-striped">
                    <thead>
                      <th>Código</th>
                      <th>Cliente</th>
                      <th>Telefone</th>
                      <th>Descriçao</th>
                    </thead>
                    <tbody>
                      <?php foreach ($lista_contratos_realizados as $row => $tupla): ?>
                        <tr>
                          <td name="id_contrato"><?=$tupla['id']?></td>
                          <td><?=$tupla['cliente_nome']?></td>
                          <td><?=$tupla['cliente_telefone']?></td>
                          <td><?=$tupla['servico_descricao']?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php else: ?>
                  <div class="row alert alert-warning" role="alert">
                    Você ainda não tem nenhum Contrato feito!
                  </div>
                <?php endif; ?>

              </div>
            </div>
          <?php endif; ?>
          <div class="tab-pane fade" id="messages-painel" role="tab-painel-3" aria-labelledby="messages-tab">
          </div>
          <div class="tab-pane fade" id="setthings-painel" role="tab-painel-4" aria-labelledby="setthings-tab">
            <form class="form formulario" action="" method="post">
              <?php foreach ($bean as $key => $value): ?>
                <?php if (in_array($key, array('genero', 'estado', 'cidade'))) continue;?>
                <div class="row">
                  <div class="col-2 mt-2">
                    <?php if (in_array($key, array('cpf', 'cpnj'))): ?>
                      <label for=""><?=strtoupper($key)?> :</label>
                    <?php else: ?>
                      <label for=""><?=ucfirst($key)?> :</label>
                    <?php endif;?>
                  </div>
                  <div class="input-group input-group-sm mb-4 col-8 input-row">
                    <input class="form-control <?=$key?>" disabled type="text" name="<?=$key?>" value="<?=$value?>">
                    <button class="btn btn-outline-secondary" name="update" title="Editar">
                      <i class="fa fa-pen fa-sm"></i>
                    </button>
                    <button class="btn btn-outline-secondary" disabled name="save" title="Salvar">
                      <i class="fa fa-save fa-sm"></i>
                    </button>
                  </div>
                </div>
              <?php endforeach;?>
              <div class="row">
                <div class="col-2 mt-2">
                  <label for="">Genero :</label>
                </div>
                <div class="input-group input-group-sm mb-4 col-8 input-row">
                  <select disabled class="custom-select" name="genero">
                    <option hidden selected value="<?=$bean['genero']?>">
                      <?php
                      switch ($bean['genero']) {
                        case 'M':
                        echo "Masculino";
                        break;
                        case 'F':
                        echo "Femenino";
                        break;
                        case 'O':
                        echo "Outro";
                        break;
                        default:
                        echo "Selecionar..";
                        break;
                      }
                      ?>
                    </option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    <option value="O">Outro</option>
                  </select>
                  <button class="btn btn-outline-secondary" name="update" title="Editar">
                    <i class="fa fa-pen fa-sm"></i>
                  </button>
                  <button class="btn btn-outline-secondary" disabled name="save" title="Salvar">
                    <i class="fa fa-save fa-sm"></i>
                  </button>
                </div>
              </div>
              <?php
              $estado = new Estado();
              $cidade = new Cidade();
              $brasil = array('Norte', 'Sul', 'Centro-Oeste', 'Sudeste', 'Nordeste');
              $estado_nome = $estado->searchCampoByValor('id', $_SESSION['estado_id'], 'nome');
              $cidade_nome = $cidade->searchCampoByValor('id', $_SESSION['cidade_id'], 'nome');
              ?>
              <div class="row">
                <div class="col-2 mt-2">
                  <label for="">Estado :</label>
                </div>
                <div class="input-group input-group-sm mb-4 col-8 input-row">
                  <select disabled class="custom-select" name="estado_id" onchange="loadCidades()" id="estado">
                    <option value="<?=$_SESSION['estado_id']?>" selected hidden><?=$estado_nome?></option>
                    <?php foreach ($brasil as $key => $regiao): ?>
                      <optgroup label="<?=$regiao?>">
                        <?php foreach ($estado->readPerRegion($regiao) as $key => $tupla): ?>
                          <option value="<?=$tupla['id']?>"><?=$tupla['nome'];?></option>
                        <?php endforeach;?>
                      </optgroup>
                    <?php endforeach;?>
                  </select>
                  <select disabled class="custom-select" name="cidade_id" id="cidade">
                    <option value="<?=$_SESSION['cidade_id']?>" selected hidden><?=$cidade_nome?></option>
                  </select>
                  <button class="btn btn-outline-secondary" name="update" title="Editar">
                    <i class="fa fa-pen fa-sm"></i>
                  </button>
                  <button class="btn btn-outline-secondary" disabled name="save" title="Salvar">
                    <i class="fa fa-save fa-sm"></i>
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-2">
                  <label for="">Senha:</label>
                </div>
                <div class="input-group input-group-sm mb-4 col-8 input-row">
                  <input class="form-control" type="password" name="senha" placeholder="Digite a nova senha." disabled>
                  <button class="btn btn-outline-secondary" name="update" title="Editar">
                    <i class="fa fa-pen fa-sm"></i>
                  </button>
                  <button class="btn btn-outline-secondary" disabled name="save" title="Salvar">
                    <i class="fa fa-save fa-sm"></i>
                  </button>
                </div>
              </div>
              <button class="btn btn-success" type="button" id="update_all">Atualizar Dados</button>
              <button class="btn btn-danger" type="button" id="delete_account">Deletar Conta</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php else: ?>
  <script type="text/javascript">
  location.href = "http://localhost:8080";
  </script>
<?php endif;?>
<!-- Footer -->
<?php include_once ROOT . '/_slicesHTML/footer.php';?>
</body>
</html>
