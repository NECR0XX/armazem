<?php
session_start();


session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Quiz</title>
</head>
<body>
    <h1>Resultado</h1>
    <p>Sua pontuação: <?php echo $_GET['score']; ?> de 2</p>
    <a href="question.php">Voltar</a>
</body>
</html>