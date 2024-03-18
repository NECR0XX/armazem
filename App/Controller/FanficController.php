<?php
require_once 'C:\xampp\htdocs\Fanfic_teste\App\Model\FanficModel.php';


class FanficController {
    private $fanficModel;

    public function __construct($pdo) {

        $this->fanficModel = new FanficModel($pdo);
    }

    public function criarFanfic($imagem, $titulo, $sinopse, $categoria_id, $nome_user) {
        $this->fanficModel->criarFanfic($imagem, $titulo, $sinopse, $categoria_id, $nome_user);
    }

    public function listarFanfics() {
        return $this->fanficModel->listarFanfics();
    }

    public function exibirListaFanfics() {
        $fanfics = $this->fanficModel->listarFanfics();
        include '../../Resources/View/fanfics/lista.php';
    }
}
?>