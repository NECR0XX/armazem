<?php
include '../DBs/configCS.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_GET['id'])) {
        header('Location: opcoes_fiscal.php');
        exit;
    }
    
    $id_fiscal = $_GET['id'];

    $data = $_POST['data'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $tipo = $_POST['tipo'];
    $cliente_fornecedor = $_POST['cliente_fornecedor'];
    $nota_fiscal = $_POST['nota_fiscal'];
    $imposto = $_POST['imposto'];
    $metodo_pagamento = $_POST['metodo_pagamento'];
    $codigo_fiscal = $_POST['codigo_fiscal'];
    $contas_contabeis = $_POST['contas_contabeis'];
    $localizacao = $_POST['localizacao'];
    $responsavel = $_POST['responsavel'];
    $status = $_POST['status'];
    $observacoes = $_POST['observacoes'];

    $stmt = $pdo->prepare('UPDATE fiscal SET data = ?, descricao = ?, valor = ?, tipo = ?, cliente_fornecedor = ?, nota_fiscal = ?, imposto = ?, metodo_pagamento = ?, codigo_fiscal = ?, contas_contabeis = ?, localizacao = ?, responsavel = ?, status = ?, observacoes = ? WHERE id_fiscal = ?');
    $stmt->execute([$data, $descricao, $valor, $tipo, $cliente_fornecedor, $nota_fiscal, $imposto, $metodo_pagamento, $codigo_fiscal, $contas_contabeis, $localizacao, $responsavel, $status, $observacoes, $id_fiscal]);
    header('Location: opcoes_fiscal.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: opcoes_fiscal.php');
    exit;
}

$id_fiscal = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM fiscal WHERE id_fiscal = ?');
$stmt->execute([$id_fiscal]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: opcoes_fiscal.php');
    exit;   
}

$data = $appointment['data'];
$descricao = $appointment['descricao'];
$valor = $appointment['valor'];
$tipo = $appointment['tipo'];
$cliente_fornecedor = $appointment['cliente_fornecedor'];
$nota_fiscal = $appointment['nota_fiscal'];
$imposto = $appointment['imposto'];
$metodo_pagamento = $appointment['metodo_pagamento'];
$codigo_fiscal = $appointment['codigo_fiscal'];
$contas_contabeis = $appointment['contas_contabeis'];
$localizacao = $appointment['localizacao'];
$responsavel = $appointment['responsavel'];
$status = $appointment['status'];
$observacoes = $appointment['observacoes'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../public/css/style3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/adm3.css">
    <title>Atualizar Conta</title>
</head>
<body>
    <a href="opcoes_fiscal.php">Voltar</a>
<h1>Atualizar Conta</h1>
<form method="post">

    <label for="data">Data:</label>
    <input type="date" name="data" value="<?php echo $data; ?>" required><br>

    <label for="descricao">Descrição:</label>
    <input type="text" name="descricao" value="<?php echo $descricao; ?>" required><br>

    <label for="valor">Valor:</label>
    <input type="number" name="valor" value="<?php echo $valor; ?>" required><br>

    <label for="tipo">Tipo:</label>
    <select name="tipo" required>
        <option value="">Selecione uma opção</option>
        <option value="Compra"<?php if ($tipo == 'Compra') echo ' selected'; ?>>Compra</option>
        <option value="Venda"<?php if ($tipo == 'Venda') echo ' selected'; ?>>Venda</option>
        <option value="Despesa"<?php if ($tipo == 'Despesa') echo ' selected'; ?>>Despesa</option>
        <option value="Receita"<?php if ($tipo == 'Receita') echo ' selected'; ?>>Receita</option>
    </select><br>

    <label for="cliente_fornecedor">Cliente/Fornecedor:</label>
    <input type="text" name="cliente_fornecedor" value="<?php echo $cliente_fornecedor; ?>" required><br>

    <label for="nota_fiscal">Nota Fiscal:</label>
    <input type="number" name="nota_fiscal" value="<?php echo $nota_fiscal; ?>" required><br>

    <label for="imposto">Imposto:</label>
    <input type="number" name="imposto" value="<?php echo $imposto; ?>" required><br>

    <label for="metodo_pagamento">Método de Pagamento:</label>
    <select name="metodo_pagamento" required>
        <option value="">Selecione um método de pagamento</option>
        <option value="Dinheiro"<?php if ($metodo_pagamento == 'Dinheiro') echo ' selected'; ?>>Dinheiro</option>
        <option value="Pix"<?php if ($metodo_pagamento == 'Pix') echo ' selected'; ?>>Pix</option>
        <option value="Boleto Bancário"<?php if ($metodo_pagamento == 'Boleto Bancário') echo ' selected'; ?>>Boleto Bancário</option>
        <option value="Cartão de Crédito"<?php if ($metodo_pagamento == 'Cartão de Crédito') echo ' selected'; ?>>Cartão de Crédito</option>
        <option value="Cartão de Debito"<?php if ($metodo_pagamento == 'Cartão de Debito') echo ' selected'; ?>>Cartão de Debito</option>
    </select><br>

    <label for="codigo_fiscal">Código Fiscal:</label>
    <input type="number" name="codigo_fiscal" value="<?php echo $codigo_fiscal; ?>" required><br>

    <label for="contas_contabeis">Contas Contábeis:</label>
    <input type="number" name="contas_contabeis" value="<?php echo $contas_contabeis; ?>" required><br>

    <label for="localizacao">Localização:</label>
    <input type="text" name="localizacao" value="<?php echo $localizacao; ?>" required><br>

    <label for="responsavel">Responsável:</label>
    <input type="text" name="responsavel" value="<?php echo $responsavel; ?>" required><br>

    <label for="status">Status:</label>
    <select name="status" required>
        <option value=""><?php echo $status; ?></option>
        <option value="1">Concluído</option>
        <option value="2">Pendente</option>
        <option value="3">Cancelada</option>
    </select><br>

    <label for="observacoes">Observações:</label>
    <textarea name="observacoes" cols="30" rows="5" required><?php echo $observacoes; ?></textarea><br>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>
