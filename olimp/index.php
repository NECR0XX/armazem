<?php
session_start();

$score = isset($_GET['score']) ? intval($_GET['score']) : 0;

if ($score == 0 && $score <= 3) {
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
    <link rel="stylesheet" href="teste.css">
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
                <h1>Sua pontuação: <?php //echo $_GET['score']; ?> de 10</h1>
                <p><?php echo $message; ?></p>
                <button id="modalBtn" class="results">
                    Ver acertos e erros
                </button>
            </div>
        </div>
    </section>
    <div id="resultModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Acertos</h3>
            <ul>
                <?php foreach ($acertos as $pergunta => $resposta) : ?>
                    <li><?php echo "Pergunta $pergunta: $resposta"; ?></li>
                <?php endforeach; ?>
            </ul>
            <h3>Erros</h3>
            <ul>
                <?php foreach ($erros as $pergunta => $resposta) : ?>
                    <li><?php echo "Pergunta $pergunta: Sua resposta: " . ($resposta['usuario'] ?? 'Não respondida') . " | Resposta correta: " . $resposta['correta']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <script>
        var modal = document.getElementById("resultModal");
        var btn = document.getElementById("modalBtn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>