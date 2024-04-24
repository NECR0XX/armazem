<h2>Excluir</h2>
    <form method="post">
        <select name="excluir_id_frota">
            <?php foreach ($frotas as $frota): ?>
                <option value="<?php echo $frota['id_frota']; ?>"><?php echo $frota['marca_modelo']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir</button>
    </form>
<!-- TEM IMAGEM -->