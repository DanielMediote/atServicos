<?php require_once '../config.php';?>
<?php require_once HEAD;?>

<body>
    <?php require_once ROOT . '/_slicesHTML/navbar.php';?>
    <?php if ($_SESSION['status']): ?>
        <?php if ($_SESSION['ocupacao'] == 'Prestador'): ?>
            <script type="text/javascript">
            location.href = "http://localhost:8080";
            </script>
        <?php else: ?>
            <?php
            $servico = new Servico();
            $contrato = new Contrato();
            $cliente = new Cliente();
            $prestador = new Prestador();

            $id = ($_SESSION['ocupacao'] == 'Cliente') ?
            $cliente->searchCampoByValor('id_pessoa', $_SESSION['id'], 'id') :
            $prestador->searchCampoByValor('id_pessoa', $_SESSION['id'], 'id');
            $lista = $servico->listarServicos();
            ?>
            <?php if (count($lista) == 0): ?>
                <h1 style="height: 50vh;" class="text-info d-flex justify-content-center align-items-center">Não há Serviços disponíveis no momento.</h1>
            <?php else: ?>
                <div class="grid m-4">
                    <h2 class="mb-4 text-center">Serviços Disponíveis</h2>
                    <div class="d-flex justify-content-center">
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Serviço</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Prestador</th>
                                <th>Telefone</th>
                            </thead>
                            <tbody>
                                <?php foreach ($lista as $chave => $tupla): ?>
                                    <tr class="servico">
                                        <td name="id_servico"><?=$tupla['id']?></td>
                                        <td name="nome_servico"><?=$tupla['nome_servico']?></td>
                                        <td name="descricao_servico">
                                            <?php
                                            if (strlen($tupla['descricao']) >= 50) echo substr($tupla['descricao'], 0, 50)."..";
                                            else echo $tupla['descricao'];?>
                                        </td>
                                        <td name="preco_servico"><?="R$ ".$tupla['preco']?></td>
                                        <td name="nome_prestador"><?=$tupla['nome_prestador']?></td>
                                        <td name="telefone_prestador"><?=$tupla['telefone_prestador']?></td>
                                        <td>
                                            <?php
                                            $rows = $contrato->listarLimiteContratosCliente($id, $tupla['id']);
                                            if ($rows == 1): ?>
                                            <button disabled class="btn btn-success" type="button" name="contratar">Contratado</button>
                                        <?php else: ?>
                                            <button class="btn btn-primary" type="button" name="contratar">Contratar</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php else: ?>
    <script type="text/javascript">
    location.href = "http://localhost:8080";
    </script>
<?php endif; ?>

<?php require_once ROOT . '/_slicesHTML/footer.php';?>
</body>

</html>
