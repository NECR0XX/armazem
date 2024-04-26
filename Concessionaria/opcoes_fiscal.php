<?php
include_once 'App/Controller/FiscalController.php';
include_once '../DBs/configCS.php';

$fiscalController = new FiscalController($pdo);

if (isset($_POST['data']) &&
    isset($_POST['descricao']) &&
    isset($_POST['valor']) &&
    isset($_POST['tipo']) &&
    isset($_POST['cliente_fornecedor']) &&
    isset($_POST['nota_fiscal']) &&
    isset($_POST['imposto']) &&
    isset($_POST['metodo_pagamento']) &&
    isset($_POST['codigo_fiscal']) &&
    isset($_POST['contas_contabeis']) &&
    isset($_POST['localizacao']) &&
    isset($_POST['responsavel']) &&
    isset($_POST['status']) &&
    isset($_POST['observacoes'])) 
{
    $fiscalController->criarFiscal($_POST['data'], $_POST['descricao'], $_POST['valor'], $_POST['tipo'], $_POST['cliente_fornecedor'], $_POST['nota_fiscal'], $_POST['imposto'], $_POST['metodo_pagamento'], $_POST['codigo_fiscal'], $_POST['contas_contabeis'], $_POST['localizacao'], $_POST['responsavel'], $_POST['status'], $_POST['observacoes']);
}

// Atualiza fiscal
if (isset($_POST['id_fiscal_atualizar']) && isset($_POST['data_atualizar']) && isset($_POST['descricao_atualizar']) && isset($_POST['valor_atualizar']) && isset($_POST['tipo_atualizar']) && isset($_POST['cliente_fornecedor_atualizar']) && isset($_POST['nota_fiscal_atualizar']) && isset($_POST['imposto_atualizar']) && isset($_POST['metodo_pagamento_atualizar']) && isset($_POST['codigo_fiscal_atualizar']) && isset($_POST['fiscal_contabeis_atualizar']) && isset($_POST['localizacao_atualizar']) && isset($_POST['responsavel_atualizar']) && isset($_POST['status_atualizar']) && isset($_POST['observacoes_atualizar'])) 
{
    $fiscalController->atualizarFiscal($_POST['id_fiscal_atualizar'], $_POST['data_atualizar'], $_POST['descricao_atualizar'], $_POST['valor_atualizar'], $_POST['tipo_atualizar'], $_POST['cliente_fornecedor_atualizar'], $_POST['nota_fiscal_atualizar'], $_POST['imposto_atualizar'], $_POST['metodo_pagamento_atualizar'], $_POST['codigo_fiscal_atualizar'], $_POST['contas_contabeis_atualizar'], $_POST['localizacao_atualizar'], $_POST['responsavel_atualizar'], $_POST['status_atualizar'], $_POST['observacoes_atualizar']);
}

// Excluir fiscal
if (isset($_POST['excluir_id_fiscal'])) {
    $fiscalController->excluirFiscal($_POST['excluir_id_fiscal']);
}

$fiscals = $fiscalController->listarFiscals();
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
        <legend><h2>Lista Fiscal</h2></legend>
            <ul>
            <?php foreach ($fiscals as $fiscal): ?>
                <li>ID: <?php echo $fiscal['id_fiscal']; ?> - Data: <?php echo $fiscal['data']; ?> - Descrição: <?php echo $fiscal['descricao']; ?> 
                - Valor: <?php echo $fiscal['valor']; ?> - Tipo: <?php echo $fiscal['tipo']; ?> - Cliente/Fornecedor: <?php echo $fiscal['cliente_fornecedor']; ?> 
                - Nota Fiscal: <?php echo $fiscal['nota_fiscal']; ?> - Imposto: <?php echo $fiscal['imposto']; ?> - Método de Pagamento: <?php echo $fiscal['metodo_pagamento']; ?> 
                - Código Fiscal: <?php echo $fiscal['codigo_fiscal']; ?> - Contas Contábeis: <?php echo $fiscal['contas_contabeis']; ?> - Localização: <?php echo $fiscal['localizacao']; ?> 
                - Responsável: <?php echo $fiscal['responsavel']; ?> - Status: <?php echo $fiscal['status']; ?> - Observações: <?php echo $fiscal['observacoes']; ?></li>
            <?php endforeach; ?>
            </ul>
    </fieldset>

<h2>Excluir Fiscal</h2>
    <form method="post">
        <select name="excluir_id_fiscal">
            <?php foreach ($fiscals as $fiscal): ?>
                <option value="<?php echo $fiscal['id_fiscal']; ?>"><?php echo $fiscal['id_fiscal']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir</button>
    </form>
</body>
</html>