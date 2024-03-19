<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <h1>Lista de fanfics</h1>
    <?php foreach ($caps as $cap): ?>
    <ul>
        <li><?php echo "Título: " . $cap['titulo']; ?></li>
        <li><?php echo "Texto" . $cap['texto']; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>