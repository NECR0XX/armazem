<?php
require_once 'App/Model/FrotaModel.php';


class FrotaController {
    private $frotaModel;

    public function __construct($pdo) {

        $this->frotaModel = new FrotaModel($pdo);
    }

    public function criarFrota($marca_modelo, $ano_fabricacao, $placa, $numero_chassi, $tipo_veiculo, $tipo_combustivel, $quilometragem, $data_prox_rev, $historico_manutencao, $seguro, $documentacao, $localizacao_atual, $responsavel, $status, $observacoes, $imagem) {
        $this->frotaModel->criarFrota($marca_modelo, $ano_fabricacao, $placa, $numero_chassi, $tipo_veiculo, $tipo_combustivel, $quilometragem, $data_prox_rev, $historico_manutencao, $seguro, $documentacao, $localizacao_atual, $responsavel, $status, $observacoes, $imagem);
    }

    public function listarFrotas() {
        return $this->frotaModel->listarFrotas();
    }

    public function exibirListaFrotas() {
        $frotas = $this->frotaModel->listarFrotas();
        include '../../Resources/Views/Frota/lista.php';
    }

    public function atualizarFrota($id_frota, $marca_modelo, $ano_fabricacao, $placa, $numero_chassi, $tipo_veiculo, $tipo_combustivel, $quilometragem, $data_prox_rev, $historico_manutencao, $seguro, $documentacao, $localizacao_atual, $responsavel, $status, $observacoes, $imagem) {
        $this->frotaModel->atualizarFrota($id_frota, $marca_modelo, $ano_fabricacao, $placa, $numero_chassi, $tipo_veiculo, $tipo_combustivel, $quilometragem, $data_prox_rev, $historico_manutencao, $seguro, $documentacao, $localizacao_atual, $responsavel, $status, $observacoes, $imagem);
    }
    
    public function excluirFrota ($id_frota) {
        $this->frotaModel->excluirFrota($id_frota);
    }
}
?>
