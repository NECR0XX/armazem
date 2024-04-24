<!-- FINALIZADO -->
<h2>Excluir</h2>
    <form method="post">
        <select name="excluir_id_comercial">
            <?php foreach ($comerciais as $comercial): ?>
                <option value="<?php echo $comercial['id_comercial']; ?>"><?php echo $comercial['identificacao_cliente']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir</button>
    </form>

    <h2>Atualizar</h2>
    <form method="post">
        <select name="id_comercial">
            <?php foreach ($comerciais as $comercial): ?>
                <option value="<?php echo $comercial['id_comercial']; ?>"><?php echo $comercial['id_comercial']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="atualizar_nome_cliente" placeholder="Nome do Cliente" required>
        <input type="number" name="atualizar_telefone_cliente" placeholder="Telefone do Cliente" required>
        <input type="email" name="atualizar_email_cliente" placeholder="E-mail do Cliente" required>
        <input type="text" name="atualizar_identificacao_cliente" placeholder="Identificação do Cliente" required>
        <input type="text" name="atualizar_marca_car" placeholder="Marca do Carro" required>
        <input type="text" name="atualizar_modelo_car" placeholder="Modelo do Carro" required>
        <input type="text" name="atualizar_caracteristicas_car" placeholder="Características do Carro" required>
        <input type="number" name="atualizar_preco_car" placeholder="Preço do Carro" required>
        <input type="text" name="atualizar_numero_chassi" placeholder="Número do Chassi" required>
        <input type="date" name="atualizar_data_venda" placeholder="Data da Venda" required>
        <input type="text" name="atualizar_tipo_transacao" placeholder="Tipo de Transação" required>
        <input type="text" name="atualizar_forma_paga" placeholder="Forma de Pagamento" required>
        <input type="text" name="atualizar_nota_fiscal" placeholder="Nota Fiscal" required>
        <input type="number" name="atualizar_valor_total" placeholder="Valor Total" required>
        <input type="text" name="atualizar_canal_venda" placeholder="Canal de Venda" required>
        <input type="text" name="atualizar_vendedor" placeholder="Vendedor" required>
        <select name="atualizar_estado_transacao" required>
            <option value="">Estado da Transação...</option>
            <option value="1">Aprovado</option>
            <option value="2">Cancelado</option>
            <option value="3">Em andamento</option>
        </select>
        <button type="submit">Atualizar</button>
    </form>