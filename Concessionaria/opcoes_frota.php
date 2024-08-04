<?php
include_once 'App/Controller/FrotaController.php';
include_once '../DBs/configCS.php';

$frotaController = new FrotaController($pdo);

if (isset($_FILES['imagem']) && !empty($_FILES['imagem'])) {
    $imagem = "../../Resources/Assets/Uploads/" . $_FILES['imagem']['name'];
    move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
} else {
    $imagem = "";
}

if (isset($_POST['marca_modelo']) && 
    isset($_POST['ano_fabricacao']) &&
    isset($_POST['placa']) &&
    isset($_POST['numero_chassi']) &&
    isset($_POST['tipo_veiculo']) &&
    isset($_POST['tipo_combustivel']) &&
    isset($_POST['quilometragem']) &&
    isset($_POST['data_prox_rev']) &&
    isset($_POST['historico_manutencao']) &&
    isset($_POST['seguro']) &&
    isset($_POST['documentacao']) &&
    isset($_POST['localizacao_atual']) &&
    isset($_POST['responsavel']) &&
    isset($_POST['status']) &&
    isset($_POST['observacoes'])) 
{
    $frotaController->criarFrota($_POST['marca_modelo'], $_POST['ano_fabricacao'], $_POST['placa'], $_POST['numero_chassi'], $_POST['tipo_veiculo'], $_POST['tipo_combustivel'], $_POST['quilometragem'], $_POST['data_prox_rev'], $_POST['historico_manutencao'], $_POST['seguro'], $_POST['documentacao'], $_POST['localizacao_atual'], $_POST['responsavel'], $_POST['status'], $_POST['observacoes'], $imagem);
    header('Location: #');
}

// Atualiza Frota
if (isset($_POST['id_frota']) && isset($_POST['atualizar_marca_modelo']) && isset($_POST['atualizar_ano_fabricacao']) && isset($_POST['atualizar_placa']) && isset($_POST['atualizar_numero_chassi']) && isset($_POST['atualizar_tipo_veiculo']) && isset($_POST['atualizar_tipo_combustivel']) && isset($_POST['atualizar_quilometragem']) && isset($_POST['atualizar_data_prox_rev']) && isset($_POST['atualizar_historico_manutencao']) && isset($_POST['atualizar_seguro']) && isset($_POST['atualizar_documentacao']) && isset($_POST['atualizar_localizacao_atual']) && isset($_POST['atualizar_responsavel']) && isset($_POST['atualizar_status']) && isset($_POST['atualizar_observacoes'])) {
    $frotaController->atualizarFrota($_POST['id_frota'], $_POST['atualizar_marca_modelo'], $_POST['atualizar_ano_fabricacao'], $_POST['atualizar_placa'], $_POST['atualizar_numero_chassi'], $_POST['atualizar_tipo_veiculo'], $_POST['atualizar_tipo_combustivel'], $_POST['atualizar_quilometragem'], $_POST['atualizar_data_prox_rev'], $_POST['atualizar_historico_manutencao'], $_POST['atualizar_seguro'], $_POST['atualizar_documentacao'], $_POST['atualizar_localizacao_atual'], $_POST['atualizar_responsavel'], $_POST['atualizar_status'], $_POST['atualizar_observacoes']);
}

// Excluir Frota
if (isset($_POST['excluir_id_frota'])) {
    $frotaController->excluirFrota($_POST['excluir_id_frota']);
}

$frotas = $frotaController->listarFrotas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="opcoes.php">home</a>

<fieldset>
    <legend><h2>Lista</h2></legend>
    <ul>
        <?php foreach ($frotas as $frota): ?>
            <li><strong>ID:</strong> <?php echo $frota['id_frota']; ?> - <strong>Marca/Modelo:</strong> <?php echo $frota['marca_modelo']; ?> - <strong>Ano de Fabricação:</strong> <?php echo $frota['ano_fabricacao']; ?> 
            - <strong>Placa:</strong> <?php echo $frota['placa']; ?> - <strong>Número de Chassi:</strong> <?php echo $frota['numero_chassi']; ?> 
            - <strong>Tipo de Veículo:</strong> <?php echo $frota['tipo_veiculo']; ?> - <strong>Tipo de Combustível:</strong> <?php echo $frota['tipo_combustivel']; ?> 
            - <strong>Quilometragem:</strong> <?php echo $frota['quilometragem']; ?> - <strong>Data da Próxima Revisão:</strong> <?php echo $frota['data_prox_rev']; ?> 
            - <strong>Histórico de Manutenção:</strong> <?php echo $frota['historico_manutencao']; ?> - <strong>Seguro:</strong> <?php echo $frota['seguro']; ?> 
            - <strong>Documentação:</strong> <?php echo $frota['documentacao']; ?> - <strong>Localização Atual:</strong> <?php echo $frota['localizacao_atual']; ?> 
            - <strong>Responsável:</strong> <?php echo $frota['responsavel']; ?> 
            - <strong>Status:</strong> <?php echo $frota['status']; ?> - <strong>Observações:</strong> <?php echo $frota['observacoes']; ?>
            - <?php 
                if (!empty($frota['imagem'])) {
                    echo '<img src="' . $frota['imagem'] . '" alt="Imagem do produto" width="100">';
                } else {
                    echo 'Sem Imagem';
                }; ?>
            - <?php echo "<a href='atualizarfrota.php?id={$frota['id_frota']}'>Atualizar</a>" ?></li>
        <?php endforeach; ?>
    </ul>
</fieldset>



<h2>Excluir</h2>
    <form method="post">
        <select name="excluir_id_frota">
            <?php foreach ($frotas as $frota): ?>
                <option value="<?php echo $frota['id_frota']; ?>"><?php echo $frota['marca_modelo']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir</button>
    </form>
</body>
</html>