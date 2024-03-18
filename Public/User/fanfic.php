<?php
require_once '../../Config/config.php';
require_once '../../App/Controller/FanficController.php';

// Verifica se o ID da fanfic foi passado na URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $fanficId = $_GET['id'];

    $fanficController = new FanficController($pdo);
    $fanfics = $fanficController->getFanficById($fanficId);

    // Verifica se a fanfic foi encontrada
    if ($fanfic) {
        // Exibir as informações da fanfic encontrada
        // Por exemplo:
        echo "<h1>{$fanfic['titulo']}</h1>";
        echo "<p>{$fanfic['conteudo']}</p>";
        // Exibir outras informações da fanfic, se necessário
    } else {
        // Se a fanfic não for encontrada, exibir uma mensagem de erro
        echo "<p>Fanfic não encontrada.</p>";
    }
} else {
    // Se o ID da fanfic não for passado na URL, exibir uma mensagem de erro
    echo "<p>ID da fanfic não especificado.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>