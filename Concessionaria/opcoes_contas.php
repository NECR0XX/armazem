
<?php
include_once 'App/Controller/ContasController.php';
include_once '../DBs/configCS.php';

$contasController = new contasController($pdo);

if (isset($_POST['fornecedores']) && 
    isset($_POST['salarios_benef']) &&
    isset($_POST['aluguel']) &&
    isset($_POST['contas_publicas']) &&
    isset($_POST['impostos']) &&
    isset($_POST['emprestimos']) &&
    isset($_POST['manutencao']) &&
    isset($_POST['seguros']) &&
    isset($_POST['marketing']) &&
    isset($_POST['despesas_adm']) &&
    isset($_POST['logistica']) &&
    isset($_POST['pesquisa']) &&
    isset($_POST['garantia'])) 
{
    $contasController->criarConta($_POST['fornecedores'], $_POST['salarios_benef'], $_POST['aluguel'], $_POST['contas_publicas'], $_POST['impostos'], $_POST['emprestimos'], $_POST['manutencao'], $_POST['seguros'], $_POST['marketing'], $_POST['despesas_adm'], $_POST['logistica'], $_POST['pesquisa'], $_POST['garantia']);
}

// Atualiza conta
if (isset($_POST['id_conta']) && isset($_POST['fornecedores_atualizar']) && isset($_POST['salarios_benef_atualizar']) &&isset($_POST['aluguel_atualizar']) &&isset($_POST['contas_publicas_atualizar']) &&isset($_POST['impostos_atualizar']) &&isset($_POST['emprestimos_atualizar']) &&isset($_POST['manutencao_atualizar']) &&isset($_POST['seguros_atualizar']) &&isset($_POST['marketing_atualizar']) &&isset($_POST['despesas_adm_atualizar']) &&isset($_POST['logistica_atualizar']) &&isset($_POST['pesquisa_atualizar']) &&isset($_POST['garantia_atualizar'])) 
{
    $contasController->atualizarConta($_POST['id_conta'], $_POST['fornecedores_atualizar'], $_POST['salarios_benef_atualizar'], $_POST['aluguel_atualizar'], $_POST['contas_publicas_atualizar'], $_POST['impostos_atualizar'], $_POST['emprestimos_atualizar'], $_POST['manutencao_atualizar'], $_POST['seguros_atualizar'], $_POST['marketing_atualizar'], $_POST['despesas_adm_atualizar'], $_POST['logistica_atualizar'], $_POST['pesquisa_atualizar'], $_POST['garantia_atualizar']);
}

// Excluir conta
if (isset($_POST['excluir_id_conta'])) {
    $contasController->excluirconta($_POST['excluir_id_conta']);
}

$contas = $contasController->listarcontas();
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
<!-- FINALIZADO -->
<fieldset>
        <legend><h2>Lista de contas</h2></legend>
            <ul>
            <?php foreach ($contas as $conta): ?>
                <li>ID: <?php echo $conta['id_conta']; ?> - Fornecedores: <?php echo $conta['fornecedores']; ?> - Salários e Benefícios: <?php echo $conta['salarios_benef']; ?> 
                - Aluguel: <?php echo $conta['aluguel']; ?> - Contas Públicas: <?php echo $conta['contas_publicas']; ?> - Impostos: <?php echo $conta['impostos']; ?> 
                - Empréstimos: <?php echo $conta['emprestimos']; ?> - Manutenção: <?php echo $conta['manutencao']; ?> - Seguros: <?php echo $conta['seguros']; ?> 
                - Marketing: <?php echo $conta['marketing']; ?> - Despesas Administrativas: <?php echo $conta['despesas_adm']; ?> - Logística: <?php echo $conta['logistica']; ?> 
                - Pesquisa: <?php echo $conta['pesquisa']; ?> - Garantia: <?php echo $conta['garantia']; ?></li>
            <?php endforeach; ?>
            </ul>
    </fieldset>

    <h2>Excluir conta</h2>
    <form method="post">
        <select name="excluir_id_conta">
            <?php foreach ($contas as $conta): ?>
                <option value="<?php echo $conta['id_conta']; ?>"><?php echo $conta['id_conta']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir conta</button>
    </form>
</body>
</html>