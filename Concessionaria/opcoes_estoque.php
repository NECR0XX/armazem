<?php
include_once 'App/Controller/EstoqueController.php';
include_once '../DBs/configCS.php';

$estoqueController = new EstoqueController($pdo);

if (isset($_FILES['imagem']) && !empty($_FILES['imagem'])) {
    $imagem = "../../Resources/Assets/Uploads/" . $_FILES['imagem']['name'];
    move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
} else {
    $imagem = "";
}

if (isset($_POST['numero_referencia']) &&
    isset($_POST['categoria']) &&
    isset($_POST['quantidade']) &&
    isset($_POST['preco_unitario']) &&
    isset($_POST['fornecedor']) &&
    isset($_POST['localizacao']) &&
    isset($_POST['reabastecimento_minimo']) &&
    isset($_POST['validade']) &&
    isset($_POST['observacoes'])) 
{
    $estoqueController->criarEstoque($_POST['numero_referencia'], $_POST['categoria'], $_POST['quantidade'], $_POST['preco_unitario'], $_POST['fornecedor'], $_POST['localizacao'], $_POST['reabastecimento_minimo'], $_POST['validade'], $_POST['observacoes'], $imagem);
    header('Location: #');
}

// Atualiza Estoque
if (isset($_POST['id_estoque']) && isset($_POST['atualizar_numero_referencia']) && isset($_POST['atualizar_categoria']) && isset($_POST['atualizar_quantidade']) && isset($_POST['atualizar_preco_unitario']) && isset($_POST['atualizar_fornecedor']) && isset($_POST['atualizar_localizacao']) && isset($_POST['atualizar_reabastecimento_minimo']) && isset($_POST['atualizar_validade']) && isset($_POST['atualizar_observacoes']) && isset($_POST['atualizar_imagem'])) 
{
    $estoqueController->atualizarEstoque($_POST['id_estoque'], $_POST['atualizar_numero_referencia'], $_POST['atualizar_categoria'], $_POST['atualizar_quantidade'], $_POST['atualizar_preco_unitario'], $_POST['atualizar_fornecedor'], $_POST['atualizar_localizacao'], $_POST['atualizar_reabastecimento_minimo'], $_POST['atualizar_validade'], $_POST['atualizar_observacoes'], $_POST['atualizar_imagem']);
}

// Excluir Estoque
if (isset($_POST['excluir_id_estoque'])) {
    $estoqueController->excluirEstoque($_POST['excluir_id_estoque']);
}

$estoques = $estoqueController->listarEstoque();
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
        <?php foreach ($estoques as $estoque): ?>
            <li><strong>ID:</strong> <?php echo $estoque['id_estoque']; ?> - <strong>Número de Referência:</strong> <?php echo $estoque['numero_referencia']; ?> - <strong>Categoria:</strong> <?php echo $estoque['categoria']; ?> - <strong>Quantidade:</strong> <?php echo $estoque['quantidade']; ?> 
            - <strong>Preço Unitário:</strong> <?php echo $estoque['preco_unitario']; ?> - <strong>Fornecedor:</strong> <?php echo $estoque['fornecedor']; ?> - <strong>Localização:</strong> <?php echo $estoque['localizacao']; ?> 
            - <strong>Reabastecimento Mínimo:</strong> <?php echo $estoque['reabastecimento_minimo']; ?> - <strong>Validade:</strong> <?php echo $estoque['validade']; ?> 
            - <strong>Observações:</strong> <?php echo $estoque['observacoes']; ?> - <strong>Imagem:</strong> <?php echo $estoque['imagem']; ?>
            - <?php echo "<a href='atualizarestoque.php?id={$estoque['id_estoque']}'>Atualizar</a>" ?></li>
        <?php endforeach; ?>
        </ul>
</fieldset>



<h2>Excluir Estoque</h2>
    <form method="post">
        <select name="excluir_id_estoque">
            <?php foreach ($estoques as $estoque): ?>
                <option value="<?php echo $estoque['id_estoque']; ?>"><?php echo $estoque['id_estoque']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir Conta</button>
    </form>
</body>
</html>