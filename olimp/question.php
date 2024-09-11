<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
    <h1>Quiz de Conhecimentos Gerais</h1>
    <form action="question2.php" method="post">
        <p>1. Qual é a capital da França?</p>
        <input type="radio" name="question1" value="a" required> Londres<br>
        <input type="radio" name="question1" value="b" required> Berlim<br>
        <input type="radio" name="question1" value="c" required> Paris<br>
        <input type="radio" name="question1" value="d" required> Madri<br><br>
        
        <input type="submit" value="Próxima">
    </form>
</body>
</html>