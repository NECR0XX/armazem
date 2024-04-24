<!-- FINALIZADO -->
<fieldset>
        <legend><h2>Lista de contas</h2></legend>
            <ul>
            <?php foreach ($contas as $conta): ?>
                <li>ID: <?php echo $conta['id_conta']; ?> - Fornecedores: <?php echo $conta['fornecedores']; ?> - Salários e Benefícios: <?php echo $conta['salarios_benef']; ?> - Aluguel: <?php echo $conta['aluguel']; ?> - Contas Públicas: <?php echo $conta['contas_publicas']; ?> - Impostos: <?php echo $conta['impostos']; ?> - Empréstimos: <?php echo $conta['emprestimos']; ?> - Manutenção: <?php echo $conta['manutencao']; ?> - Seguros: <?php echo $conta['seguros']; ?> - Marketing: <?php echo $conta['marketing']; ?> - Despesas Administrativas: <?php echo $conta['despesas_adm']; ?> - Logística: <?php echo $conta['logistica']; ?> - Pesquisa: <?php echo $conta['pesquisa']; ?> - Garantia: <?php echo $conta['garantia']; ?></li>
            <?php endforeach; ?>
            </ul>
    </fieldset>

<h2>Atualizar conta</h2>
    <form method="post">
        <select name="id_conta">
        <?php foreach ($contas as $conta): ?>
            <option value="<?php echo $conta['id_conta']; ?>"><?php echo $conta['id_conta']; ?></option>
        <?php endforeach; ?>
        </select>
                <input type="text" name="fornecedores_atualizar" placeholder="Novos Fornecedores">
                <input type="text" name="salarios_benef_atualizar" placeholder="Novos Salários e Benefícios">
                <input type="text" name="aluguel_atualizar" placeholder="Novo Aluguel">
                <input type="text" name="contas_publicas_atualizar" placeholder="Novas Contas Públicas">
                <input type="text" name="impostos_atualizar" placeholder="Novos Impostos">
                <input type="text" name="emprestimos_atualizar" placeholder="Novos Empréstimos">
                <input type="text" name="manutencao_atualizar" placeholder="Nova Manutenção">
                <input type="text" name="seguros_atualizar" placeholder="Novos Seguros">
                <input type="text" name="marketing_atualizar" placeholder="Novo Marketing">
                <input type="text" name="despesas_adm_atualizar" placeholder="Novas Despesas Administrativas">
                <input type="text" name="logistica_atualizar" placeholder="Nova Logística">
                <input type="text" name="pesquisa_atualizar" placeholder="Nova Pesquisa">
                <input type="text" name="garantia_atualizar" placeholder="Nova Garantia">
                <button type="submit">Atualizar Conta</button>
    </form>

    <h2>Excluir conta</h2>
    <form method="post">
        <select name="excluir_id_conta">
            <?php foreach ($contas as $conta): ?>
                <option value="<?php echo $conta['id_conta']; ?>"><?php echo $conta['id_conta']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir conta</button>
    </form>