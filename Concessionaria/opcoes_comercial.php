<?php
include_once 'App/Controller/ComercialController.php';
include_once '../DBs/configCS.php';

$comercialController = new ComercialController($pdo);

if (isset($_POST['nome_cliente']) && 
    isset($_POST['telefone_cliente']) &&
    isset($_POST['email_cliente']) &&
    isset($_POST['identificacao_cliente']) &&
    isset($_POST['marca_car']) &&
    isset($_POST['modelo_car']) &&
    isset($_POST['caracteristicas_car']) &&
    isset($_POST['preco_car']) &&
    isset($_POST['numero_chassi']) &&
    isset($_POST['data_venda']) &&
    isset($_POST['tipo_transacao']) &&
    isset($_POST['forma_paga']) &&
    isset($_POST['nota_fiscal']) &&
    isset($_POST['valor_total']) &&
    isset($_POST['canal_venda']) &&
    isset($_POST['vendedor']) &&
    isset($_POST['estado_transacao'])) 
{
    $comercialController->criarComercial($_POST['nome_cliente'], $_POST['telefone_cliente'], $_POST['email_cliente'], $_POST['identificacao_cliente'], $_POST['marca_car'], $_POST['modelo_car'], $_POST['caracteristicas_car'], $_POST['preco_car'], $_POST['numero_chassi'], $_POST['data_venda'], $_POST['tipo_transacao'], $_POST['forma_paga'], $_POST['nota_fiscal'], $_POST['valor_total'], $_POST['canal_venda'], $_POST['vendedor'], $_POST['estado_transacao']);
    header('Location: #');
}

// Atualiza Comercial
if (isset($_POST['id_comercial']) && isset($_POST['atualizar_nome_cliente']) && isset($_POST['atualizar_telefone_cliente']) && isset($_POST['atualizar_email_cliente']) && isset($_POST['atualizar_identificacao_cliente']) && isset($_POST['atualizar_marca_car']) && isset($_POST['atualizar_modelo_car']) && isset($_POST['atualizar_caracteristicas_car']) && isset($_POST['atualizar_preco_car']) && isset($_POST['atualizar_numero_chassi']) && isset($_POST['atualizar_data_venda']) && isset($_POST['atualizar_tipo_transacao']) && isset($_POST['atualizar_forma_paga']) && isset($_POST['atualizar_nota_fiscal']) && isset($_POST['atualizar_valor_total']) && isset($_POST['atualizar_canal_venda']) && isset($_POST['atualizar_vendedor']) && isset($_POST['atualizar_estado_transacao'])) {
    $comercialController->atualizarComercial($_POST['id_comercial'], $_POST['atualizar_nome_cliente'], $_POST['atualizar_telefone_cliente'], $_POST['atualizar_email_cliente'], $_POST['atualizar_identificacao_cliente'], $_POST['atualizar_marca_car'], $_POST['atualizar_modelo_car'], $_POST['atualizar_caracteristicas_car'], $_POST['atualizar_preco_car'], $_POST['atualizar_numero_chassi'], $_POST['atualizar_data_venda'], $_POST['atualizar_tipo_transacao'], $_POST['atualizar_forma_paga'], $_POST['atualizar_nota_fiscal'], $_POST['atualizar_valor_total'], $_POST['atualizar_canal_venda'], $_POST['atualizar_vendedor'], $_POST['atualizar_estado_transacao']);
}

// Excluir Comercial
if (isset($_POST['excluir_id_comercial'])) {
    $comercialController->excluirComercial($_POST['excluir_id_comercial']);
}

$comerciais = $comercialController->listarComercials();
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
        <?php foreach ($comerciais as $comercial): ?>
            <li><strong>Id Comercial:</strong> <?php echo $comercial['id_comercial']; ?> - <strong>Nome do Cliente:</strong> <?php echo $comercial['nome_cliente']; ?> 
            - <strong>Telefone do Cliente:</strong> <?php echo $comercial['telefone_cliente']; ?> 
            - <strong>Email do Cliente:</strong> <?php echo $comercial['email_cliente']; ?> - <strong>Identificação do Cliente:</strong> <?php echo $comercial['identificacao_cliente']; ?> 
            - <strong>Marca do Carro:</strong> <?php echo $comercial['marca_car']; ?> - <strong>Modelo do Carro:</strong> <?php echo $comercial['modelo_car']; ?> 
            - <strong>Características do Carro:</strong> <?php echo $comercial['caracteristicas_car']; ?> - <strong>Preço do Carro:</strong> <?php echo $comercial['preco_car']; ?> 
            - <strong>Número do Chassi:</strong> <?php echo $comercial['numero_chassi']; ?> - <strong>Data da Venda:</strong> <?php echo $comercial['data_venda']; ?> 
            - <strong>Tipo de Transação:</strong> <?php echo $comercial['tipo_transacao']; ?> - <strong>Forma de Pagamento:</strong> <?php echo $comercial['forma_paga']; ?> 
            - <strong>Nota Fiscal:</strong> <?php echo $comercial['nota_fiscal']; ?> - <strong>Valor Total:</strong> <?php echo $comercial['valor_total']; ?> 
            - <strong>Canal de Venda:</strong> <?php echo $comercial['canal_venda']; ?> - <strong>Vendedor:</strong> <?php echo $comercial['vendedor']; ?> 
            - <strong>Estado da Transação:</strong> <?php echo $comercial['estado_transacao']; ?></li>
        <?php endforeach; ?>
    </ul>
</fieldset>



<h2>Excluir</h2>
    <form method="post">
        <select name="excluir_id_comercial">
            <?php foreach ($comerciais as $comercial): ?>
                <option value="<?php echo $comercial['id_comercial']; ?>"><?php echo $comercial['identificacao_cliente']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir</button>
    </form>
</body>
</html>