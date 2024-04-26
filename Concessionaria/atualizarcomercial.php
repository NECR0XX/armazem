<?php
include '../DBs/configCS.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_GET['id'])) {
        header('Location: opcoes_comercial.php');
        exit;
    }
    
    $id_comercial = $_GET['id'];

    $nome_cliente = $_POST['nome_cliente'];
    $telefone_cliente = $_POST['telefone_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $identificacao_cliente = $_POST['identificacao_cliente'];
    $marca_car = $_POST['marca_car'];
    $modelo_car = $_POST['modelo_car'];
    $caracteristicas_car = $_POST['caracteristicas_car'];
    $preco_car = $_POST['preco_car'];
    $numero_chassi = $_POST['numero_chassi'];
    $data_venda = $_POST['data_venda'];
    $tipo_transacao = $_POST['tipo_transacao'];
    $forma_paga = $_POST['forma_paga'];
    $nota_fiscal = $_POST['nota_fiscal'];
    $valor_total = $_POST['valor_total'];
    $canal_venda = $_POST['canal_venda'];
    $vendedor = $_POST['vendedor'];
    $estado_transacao = $_POST['estado_transacao'];

    $stmt = $pdo->prepare('UPDATE comercial SET nome_cliente = ?, telefone_cliente = ?, email_cliente = ?, identificacao_cliente = ?, marca_car = ?, modelo_car = ?, caracteristicas_car = ?, preco_car = ?, numero_chassi = ?, data_venda = ?, tipo_transacao = ?, forma_paga = ?, nota_fiscal = ?, valor_total = ?, canal_venda = ?, vendedor = ?, estado_transacao = ? WHERE id_comercial = ?');
    $stmt->execute([$nome_cliente, $telefone_cliente, $email_cliente, $identificacao_cliente, $marca_car, $modelo_car, $caracteristicas_car, $preco_car, $numero_chassi, $data_venda, $tipo_transacao, $forma_paga, $nota_fiscal, $valor_total, $canal_venda, $vendedor, $estado_transacao, $id_comercial]);
    header('Location: opcoes_comercial.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: opcoes_comercial.php');
    exit;
}

$id_comercial = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM comercial WHERE id_comercial = ?');
$stmt->execute([$id_comercial]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: opcoes_comercial.php');
    exit;   
}

$nome_cliente = $appointment['nome_cliente'];
$telefone_cliente = $appointment['telefone_cliente'];
$email_cliente = $appointment['email_cliente'];
$identificacao_cliente = $appointment['identificacao_cliente'];
$marca_car = $appointment['marca_car'];
$modelo_car = $appointment['modelo_car'];
$caracteristicas_car = $appointment['caracteristicas_car'];
$preco_car = $appointment['preco_car'];
$numero_chassi = $appointment['numero_chassi'];
$data_venda = $appointment['data_venda'];
$tipo_transacao = $appointment['tipo_transacao'];
$forma_paga = $appointment['forma_paga'];
$nota_fiscal = $appointment['nota_fiscal'];
$valor_total = $appointment['valor_total'];
$canal_venda = $appointment['canal_venda'];
$vendedor = $appointment['vendedor'];
$estado_transacao = $appointment['estado_transacao'];
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
    <a href="opcoes_frota.php">Voltar</a>
<h1>Atualizar Conta</h1>
<form method="post">

    <label for="nome_cliente">Nome do Cliente:</label>
    <input type="text" name="nome_cliente" value="<?php echo $nome_cliente; ?>" required><br>

    <label for="telefone_cliente">Telefone do Cliente:</label>
    <input type="number" name="telefone_cliente" value="<?php echo $telefone_cliente; ?>" required><br>

    <label for="email_cliente">Email do Cliente:</label>
    <input type="email" name="email_cliente" value="<?php echo $email_cliente; ?>" required><br>

    <label for="identificacao_cliente">Identificação do Cliente:</label>
    <input type="text" name="identificacao_cliente" value="<?php echo $identificacao_cliente; ?>" required><br>

    <label for="marca_car">Marca do Carro:</label>
    <input type="text" name="marca_car" value="<?php echo $marca_car; ?>" required><br>

    <label for="modelo_car">Modelo do Carro:</label>
    <input type="text" name="modelo_car" value="<?php echo $modelo_car; ?>" required><br>

    <label for="caracteristicas_car">Características do Carro:</label>
    <textarea name="caracteristicas_car" required><?php echo $caracteristicas_car; ?></textarea><br>

    <label for="preco_car">Preço do Carro:</label>
    <input type="number" name="preco_car" value="<?php echo $preco_car; ?>" required><br>

    <label for="numero_chassi">Número do Chassi:</label>
    <input type="text" name="numero_chassi" value="<?php echo $numero_chassi; ?>" required><br>

    <label for="data_venda">Data da Venda:</label>
    <input type="date" name="data_venda" value="<?php echo $data_venda; ?>" required><br>

    <label for="tipo_transacao">Tipo de Transação:</label>
    <input type="text" name="tipo_transacao" value="<?php echo $tipo_transacao; ?>" required><br>

    <label for="forma_paga">Forma de Pagamento:</label>
    <input type="text" name="forma_paga" value="<?php echo $forma_paga; ?>" required><br>

    <label for="nota_fiscal">Nota Fiscal:</label>
    <input type="number" name="nota_fiscal" value="<?php echo $nota_fiscal; ?>" required><br>

    <label for="valor_total">Valor Total:</label>
    <input type="number" name="valor_total" value="<?php echo $valor_total; ?>" required><br>

    <label for="canal_venda">Canal de Venda:</label>
    <input type="text" name="canal_venda" value="<?php echo $canal_venda; ?>" required><br>

    <label for="vendedor">Vendedor:</label>
    <input type="text" name="vendedor" value="<?php echo $vendedor; ?>" required><br>

    <label for="estado_transacao">Estado da Transação:</label>
    <select name="estado_transacao" required>
        <option value="">Selecione um estado da transação</option>
        <option value="1"<?php if ($estado_transacao == '1') echo ' selected'; ?>>Aprovado</option>
        <option value="2"<?php if ($estado_transacao == '2') echo ' selected'; ?>>Cancelado</option>
        <option value="3"<?php if ($estado_transacao == '3') echo ' selected'; ?>>Em Andamento</option>
    </select><br><br>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>
