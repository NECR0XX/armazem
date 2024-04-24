<h2>Excluir</h2>
    <form method="post">
        <select name="excluir_id_frota">
            <?php foreach ($frotas as $frota): ?>
                <option value="<?php echo $frota['id_frota']; ?>"><?php echo $frota['marca_modelo']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir</button>
    </form>

    <h2>Atualizar</h2>
    <form method="post">
        <select name="id">
            <?php foreach ($frotas as $frota): ?>
                <option value="<?php echo $frota['id_frota']; ?>"><?php echo $frota['id_frota']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="atualizar_marca_modelo" placeholder="Nova Marca e Modelo" required>
        <input type="number" name="atualizar_ano_fabricacao" placeholder="Novo Ano de Fabricação" required>
        <input type="text" name="atualizar_placa" placeholder="Nova Placa" required>
        <input type="text" name="atualizar_numero_chassi" placeholder="Novo Número do Chassi" required>
        <input type="text" name="atualizar_tipo_veiculo" placeholder="Novo Tipo de Veículo" required>
        <input type="text" name="atualizar_tipo_combustivel" placeholder="Novo Tipo de Combustível" required>
        <input type="number" name="atualizar_quilometragem" placeholder="Nova Quilometragem" required>
        <input type="date" name="atualizar_data_prox_rev" placeholder="Nova Próxima Revisão" required>
        <input type="text" name="atualizar_historico_manutencao" placeholder="Novo Histórico de Manutenção" required>
        <input type="text" name="atualizar_seguro" placeholder="Novo Seguro" required>
        <input type="text" name="atualizar_documentacao" placeholder="Nova Documentação" required>
        <input type="text" name="atualizar_localizacao_atual" placeholder="Nova Localização Atual" required>
        <input type="text" name="atualizar_responsavel" placeholder="Novo Responsável" required>
        <select name="atualizar_status" required>
            <option value="">Status...</option>
            <option value="Disponível">Disponível</option>
            <option value="Ocupado">Ocupado</option>
            <option value="Em Manutenção">Em Manutenção</option>
        </select>
        <textarea name="atualizar_observacoes" cols="30" rows="5" placeholder="Novas Observações" required></textarea>
        <input type="text" name="atualizar_imagem" placeholder="Nova Imagem" required>
        <button type="submit">Atualizar</button>
    </form>