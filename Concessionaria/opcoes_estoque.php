<h2>Excluir Estoque</h2>
    <form method="post">
        <select name="excluir_id_estoque">
            <?php foreach ($estoques as $estoque): ?>
                <option value="<?php echo $estoque['id_estoque']; ?>"><?php echo $estoque['id_estoque']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir Conta</button>
    </form>
<!-- TEM IMAGEM -->