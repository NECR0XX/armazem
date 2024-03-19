<?php
session_start();

class FanficModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar Fanfics
    public function criarFanfic($imagem, $titulo, $sinopse, $categoria_id) {
        $nome_user = $_SESSION['usuarioNomedeUsuario'];
        $user_id = $_SESSION['usuarioId'];
        $sql = "INSERT INTO fanfic (imagem, titulo, sinopse, categoria_id, nome_user, user_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$imagem, $titulo, $sinopse, $categoria_id, $nome_user, $user_id]);
    }

    // Model para listar Fanfics
    public function listarFanfics() {
        $sql = "SELECT * FROM fanfic";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
