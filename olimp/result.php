<?php
session_start();

$score = isset($_GET['score']) ? intval($_GET['score']) : 0;

if ($score >= 1 && $score <= 3) {
    $message = "Parece que as Olimpíadas não estão tão no seu radar. Que tal acompanhar mais de perto os próximos eventos?";
} elseif ($score >= 4 && $score <= 6) {
    $message = "Você tem um bom conhecimento dos eventos olímpicos! Continue acompanhando para ficar ainda mais afiado.";
} elseif ($score >= 7 && $score <= 9) {
    $message = "Impressionante! Seu conhecimento sobre as Olimpíadas é sólido e abrangente. Parece que você realmente sabe o que está acontecendo!";
} elseif ($score == 10) {
    $message = "Incrível! Você está por dentro de tudo o que acontece nas Olimpíadas. Seu conhecimento é digno de um verdadeiro especialista olímpico!";
} else {
    $message = "Pontuação inválida.";
}
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Resources/Images/Mascote_olimpiadas-removebg-preview.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Kite+One&family=Permanent+Marker&family=Playwrite+AR:wght@100..400&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="result.css">
    <title>Resultados do quiz</title>
</head>
<body>
    <section>
        <form action="index.html">
            <input type="submit" value="Recomeçar" class="submit-button">
        </form>
        <div class="container">
            <img class="masc" src="msocotasasdsad-removebg-preview.png">
            <div class="title">
                <h1>Fim de uma jornada!</h1>
                <h2>Agora que você terminou o quiz, está na hora de ver sua pontuação</h2>
            </div>
            <div class="conteudo">
                <h1>Sua pontuação: <?php echo $_GET['score']; ?> de 10</h1>
                <p><?php echo $message; ?></p>
            </div>
            <button>
                Ver acertos e erros
            </button>
        </div>
    </section>
</body>
</html>