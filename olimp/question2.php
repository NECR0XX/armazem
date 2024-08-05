<?php
session_start();

if (isset($_POST['question1'])) {
    $_SESSION['question1'] = $_POST['question1'];
}
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
    <form action="process.php" method="post">
        
        <p>3. Qual é o maior planeta do sistema solar?</p>
        <input type="radio" name="question2" value="a" required> Terra<br>
        <input type="radio" name="question2" value="b" required> Júpiter<br>
        <input type="radio" name="question2" value="c" required> Saturno<br>
        <input type="radio" name="question2" value="d" required> Marte<br><br>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>