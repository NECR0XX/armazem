<?php
include '../DBs/configCS.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_GET['id'])) {
        header('Location: opcoes_contas.php');
        exit;
    }
    
    $id_conta = $_GET['id'];

    $fornecedores = $_POST['fornecedores'];
    $salarios_benef = $_POST['salarios_benef'];
    $aluguel = $_POST['aluguel'];
    $contas_publicas = $_POST['contas_publicas'];
    $impostos = $_POST['impostos'];
    $emprestimos = $_POST['emprestimos'];
    $manutencao = $_POST['manutencao'];
    $seguros = $_POST['seguros'];
    $marketing = $_POST['marketing'];
    $despesas_adm = $_POST['despesas_adm'];
    $logistica = $_POST['logistica'];
    $pesquisa = $_POST['pesquisa'];
    $garantia = $_POST['garantia'];

    $stmt = $pdo->prepare('UPDATE contas SET fornecedores = ?, salarios_benef = ?, aluguel = ?, contas_publicas = ?, impostos = ?, emprestimos = ?, manutencao = ?, seguros = ?, marketing = ?, despesas_adm = ?, logistica = ?, pesquisa = ?, garantia = ? WHERE id_conta = ?');
    $stmt->execute([$fornecedores, $salarios_benef, $aluguel, $contas_publicas, $impostos, $emprestimos, $manutencao, $seguros, $marketing, $despesas_adm, $logistica, $pesquisa, $garantia, $id_conta]);
    header('Location: opcoes_contas.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: opcoes_contas.php');
    exit;
}

$id_conta = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM contas WHERE id_conta = ?');
$stmt->execute([$id_conta]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: opcoes_contas.php');
    exit;   
}

$fornecedores = $appointment['fornecedores'];
$salarios_benef = $appointment['salarios_benef'];
$aluguel = $appointment['aluguel'];
$contas_publicas = $appointment['contas_publicas'];
$impostos = $appointment['impostos'];
$emprestimos = $appointment['emprestimos'];
$manutencao = $appointment['manutencao'];
$seguros = $appointment['seguros'];
$marketing = $appointment['marketing'];
$despesas_adm = $appointment['despesas_adm'];
$logistica = $appointment['logistica'];
$pesquisa = $appointment['pesquisa'];
$garantia = $appointment['garantia'];
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

    <label for="fornecedores">Fornecedores:</label>
    <input type="number" name="fornecedores" value="<?php echo $fornecedores; ?>" required><br>

    <label for="salarios_benef">Salários e Benefícios:</label>
    <input type="number" name="salarios_benef" value="<?php echo $salarios_benef; ?>" required><br>

    <label for="aluguel">Aluguel:</label>
    <input type="number" name="aluguel" value="<?php echo $aluguel; ?>" required><br>

    <label for="contas_publicas">Contas Públicas:</label>
    <input type="number" name="contas_publicas" value="<?php echo $contas_publicas; ?>" required><br>

    <label for="impostos">Impostos:</label>
    <input type="number" name="impostos" value="<?php echo $impostos; ?>" required><br>

    <label for="emprestimos">Empréstimos:</label>
    <input type="number" name="emprestimos" value="<?php echo $emprestimos; ?>" required><br>

    <label for="manutencao">Manutenção:</label>
    <input type="number" name="manutencao" value="<?php echo $manutencao; ?>" required><br>

    <label for="seguros">Seguros:</label>
    <input type="number" name="seguros" value="<?php echo $seguros; ?>" required><br>

    <label for="marketing">Marketing:</label>
    <input type="number" name="marketing" value="<?php echo $marketing; ?>" required><br>

    <label for="despesas_adm">Despesas Administrativas:</label>
    <input type="number" name="despesas_adm" value="<?php echo $despesas_adm; ?>" required><br>

    <label for="logistica">Logística:</label>
    <input type="number" name="logistica" value="<?php echo $logistica; ?>" required><br>

    <label for="pesquisa">Pesquisa:</label>
    <input type="number" name="pesquisa" value="<?php echo $pesquisa; ?>" required><br>

    <label for="garantia">Garantia:</label>
    <input type="number" name="garantia" value="<?php echo $garantia; ?>" required><br><br>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>
