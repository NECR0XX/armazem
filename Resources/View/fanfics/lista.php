<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <h1>Lista de fanfics</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Autor</th>
                    <th>Título</th>
                    <th>Sinopse</th>
                    <th>Tag</th>
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fanfics as $fanfic): ?>
                    <tr>
                        <td>
                            <?php
                            if (!empty($fanfic['imagem'])) {
                                echo '<img src="' . $fanfic['imagem'] . '" alt="Imagem do fanfic" width="100">';
                            } else {
                                echo 'Sem Imagem';
                            }
                            ?>
                        </td>
                        <td><?php echo $fanfic['nome_user']; ?></td>
                        <td><?php echo $fanfic['titulo']; ?></td>
                        <td><?php echo $fanfic['sinopse']; ?></td>
                        <td><?php echo $fanfic['categoria_id']; ?></td>
                        <td >
                            <?php echo "<a style='color:black;' href='../../App/Providers/atualizar.php?id={$fanfic['id_fanfic']}'>Atualizar</a>"; ?>
                        </td>
                        <td >
                            <?php echo "<a style='color:black;' href='../../App/Providers/deletar.php?id={$fanfic['id_fanfic']}'>Deletar</a>";?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</body>
</html>