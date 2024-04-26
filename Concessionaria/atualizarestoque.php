<?php
include 'DBs/configCS.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_GET['id'])) {
        header('Location: ../../Public/User/perfil.php');
        exit;
    }
    
    $id_estoque = $_GET['id'];

    if (!empty($_FILES['nova_imagem']['tmp_name'])) {
        $imagem = "../../Resources/Assets/Uploads/" . $_FILES['nova_imagem']['name'];
        move_uploaded_file($_FILES['nova_imagem']['tmp_name'], $imagem);
    } else {
        $stmt = $pdo->prepare('SELECT imagem FROM estoque WHERE id_estoque = ?');
        $stmt->execute([$id_estoque]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $imagem = $result['imagem'];
    }

    $numero_referencia = $_POST['numero_referencia'];
    $categoria = $_POST['categoria'];
    $quantidade = $_POST['quantidade'];
    $preco_unitario = $_POST['preco_unitario'];
    $fornecedor = $_POST['fornecedor'];
    $localizacao = $_POST['localizacao'];
    $reabastecimento_minimo = $_POST['reabastecimento_minimo'];
    $validade = $_POST['validade'];
    $observacoes = $_POST['observacoes'];

    $stmt = $pdo->prepare('UPDATE estoque SET imagem = ?, numero_referencia = ?, categoria = ?, quantidade = ?, preco_unitario = ?, fornecedor = ?, localizacao = ?, reabastecimento_minimo = ?, validade = ?, observacoes = ? WHERE id_estoque = ?');
    $stmt->execute([$imagem, $numero_referencia, $categoria, $quantidade, $preco_unitario, $fornecedor, $localizacao, $reabastecimento_minimo, $validade, $observacoes, $id_estoque]);
    header('Location: ../../Public/User/perfil.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: ../../Public/User/perfil.php');
    exit;
}

$id_estoque = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM estoque WHERE id_estoque = ?');
$stmt->execute([$id_estoque]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: ../../Public/User/perfil.php');
    exit;   
}

$imagem = $appointment['imagem'];
$numero_referencia = $appointment['numero_referencia'];
$categoria = $appointment['categoria'];   
$quantidade = $appointment['quantidade'];
$preco_unitario = $appointment['preco_unitario'];
$fornecedor = $appointment['fornecedor'];
$localizacao = $appointment['localizacao'];
$reabastecimento_minimo = $appointment['reabastecimento_minimo'];
$validade = $appointment['validade'];
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
    <title>Atualizar Produto</title>
</head>
<body>
    <a href="opcoes_frota.php">Voltar</a>
<h1>Atualizar Produto</h1>
<form method="post" enctype="multipart/form-data">
    <label for="imagem">Imagem:</label>
    <input type="file" name="nova_imagem" accept="image/*"><br>

    <label for="numero_referencia">Número de Referência:</label>
    <input type="text" name="numero_referencia" value="<?php echo $numero_referencia; ?>" required><br>

    <label for="categoria">Categoria:</label>
    <input type="text" name="categoria" value="<?php echo $categoria; ?>" required><br>

    <label for="quantidade">Quantidade:</label>
    <input type="number" name="quantidade" value="<?php echo $quantidade; ?>" required><br>

    <label for="preco_unitario">Preço Unitário:</label>
    <input type="number" step="0.01" name="preco_unitario" value="<?php echo $preco_unitario; ?>" required><br>

    <label for="fornecedor">Fornecedor:</label>
    <input type="text" name="fornecedor" value="<?php echo $fornecedor; ?>" required><br>

    <label for="localizacao">Localização:</label>
    <input type="text" name="localizacao" value="<?php echo $localizacao; ?>" required><br>

    <label for="reabastecimento_minimo">Reabastecimento Mínimo:</label>
    <input type="number" name="reabastecimento_minimo" value="<?php echo $reabastecimento_minimo; ?>" required><br>

    <label for="validade">Validade:</label>
    <input type="date" name="validade" value="<?php echo $validade; ?>" required><br>

    <label for="observacoes">Observações:</label>
    <textarea name="observacoes" required><?php echo $observacoes; ?></textarea><br><br>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>