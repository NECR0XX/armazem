<?php
session_start();

if (isset($_POST['question2'])) {
    $_SESSION['question2'] = $_POST['question2'];
}

function calcularPontos($respostasUsuario) {
    $pontuacao = 0;
    $respostasCorretas = [
        'question1' => 'c',
        'question2' => 'b'
    ];

    foreach ($respostasCorretas as $pergunta => $respostaCorreta) {
        if (isset($respostasUsuario[$pergunta]) && $respostasUsuario[$pergunta] == $respostaCorreta) {
            $pontuacao++;
        }
    }

    return $pontuacao;
}

$respostasUsuario = [
    'question1' => $_SESSION['question1'],
    'question2' => $_SESSION['question2']
];

$score = calcularPontos($respostasUsuario);

header("Location: result.php?score=$score");
exit();
?>
