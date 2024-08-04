<?php
include 'DBs/configCS.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_GET['id'])) {
        header('Location: ../../Public/User/perfil.php');
        exit;
    }
    
    $id_fanfic = $_GET['id'];

    if (!empty($_FILES['nova_imagem']['tmp_name'])) {
        $imagem = "../../Resources/Assets/Uploads/" . $_FILES['nova_imagem']['name'];
        move_uploaded_file($_FILES['nova_imagem']['tmp_name'], $imagem);
    } else {
        $stmt = $pdo->prepare('SELECT imagem FROM fanfic WHERE id_fanfic = ?');
        $stmt->execute([$id_fanfic]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $imagem = $result['imagem'];
    }

    $titulo = $_POST['titulo'];
    $sinopse = $_POST['sinopse'];

    $stmt = $pdo->prepare('UPDATE fanfic SET imagem = ?, titulo = ?, sinopse = ? WHERE id_fanfic = ?');
    $stmt->execute([$imagem, $titulo, $sinopse, $id_fanfic]);
    header('Location: ../../Public/User/perfil.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: ../../Public/User/perfil.php');
    exit;
}

$id_fanfic = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM fanfic WHERE id_fanfic = ?');
$stmt->execute([$id_fanfic]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: ../../Public/User/perfil.php');
    exit;   
}

$imagem = $appointment['imagem'];
$titulo = $appointment['titulo'];   
$sinopse = $appointment['sinopse'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../public/css/style3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/adm3.css">
    <title>Atualizar Conta</title>
</head>
<body>
    <a href="opcoes_frota.php">Voltar</a>
<h1>Atualizar Conta</h1>
<form method="post" enctype="multipart/form-data">
    <label for="imagem">Imagem:</label>
    <input type="file" name="nova_imagem" accept="image/*"><br>

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" value="<?php echo $titulo; ?>" required></br>

    <label for="sinopse">Sinopse:</label>
    <textarea name="sinopse" required><?php echo $sinopse; ?></textarea></br></br>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>
