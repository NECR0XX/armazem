<?php
require_once '../../../Config/config.php';
require_once '../../../App/Controller/FanficController.php';

$fanficController = new FanficController($pdo);
$fanfics = $fanficController->listarFanfics();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (count($fanfics) > 0) {
            foreach ($fanfics as $fanfic) {
                if (!empty($fanfic['imagem'])) {
                    echo '<img src="' . $fanfic['imagem'] . '" alt="Imagem do fanfic" width="100">';
                } else {
                    echo 'Sem Imagem';
                };
                echo "<p>Título: <strong>{$fanfic['titulo']}</strong></p>";
            }
        }
    ?>
</body>
</html>