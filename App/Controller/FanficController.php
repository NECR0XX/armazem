<?php
require_once 'C:\xampp\htdocs\Fanfic_teste\App\Model\FanficModel.php';

class FanficController {
    private $fanficModel;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->fanficModel = new FanficModel($pdo);
    }

    public function criarFanfic($imagem, $titulo, $sinopse, $categoria_id, $nome_user, $user_id) {
        $this->fanficModel->criarFanfic($imagem, $titulo, $sinopse, $categoria_id, $nome_user, $user_id);
    }

    public function listarFanfics($user_id) {
        $query = "SELECT * FROM fanfic WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function exibirListaFanfics() {
        $fanfics = $this->fanficModel->listarFanfics();
        include '../../Resources/View/fanfics/lista.php';
    }
}
?>
