<?php
class FrotaModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar Frotas
    public function criarFrota($marca_modelo, $ano_fabricacao, $placa, $numero_chassi, $tipo_veiculo, $tipo_combustivel, $quilometragem, $data_prox_rev, $historico_manutencao, $seguro, $documentacao, $localizacao_atual, $responsavel, $status, $observacoes, $imagem) {
        $sql = "INSERT INTO frota_veiculo (marca_modelo, ano_fabricacao, placa, numero_chassi, tipo_veiculo, tipo_combustivel, quilometragem, data_prox_rev, historico_manutencao, seguro, documentacao, localizacao_atual, responsavel, status, observacoes, imagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$marca_modelo, $ano_fabricacao, $placa, $numero_chassi, $tipo_veiculo, $tipo_combustivel, $quilometragem, $data_prox_rev, $historico_manutencao, $seguro, $documentacao, $localizacao_atual, $responsavel, $status, $observacoes, $imagem]);
    }

    // Model para listar Frotas
    public function listarFrotas() {
        $sql = "SELECT * FROM frota_veiculo";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Model para atualizar Frotas
    public function atualizarFrota($id_frota, $marca_modelo, $ano_fabricacao, $placa, $numero_chassi, $tipo_veiculo, $tipo_combustivel, $quilometragem, $data_prox_rev, $historico_manutencao, $seguro, $documentacao, $localizacao_atual, $responsavel, $status, $observacoes, $imagem){
        $sql = "UPDATE frota_veiculo SET marca_modelo = ?, ano_fabricacao = ?, placa = ?, numero_chassi = ?, tipo_veiculo = ?, tipo_combustivel = ?, quilometragem = ?, data_prox_rev = ?, historico_manutencao = ?, seguro = ?, documentacao = ?, localizacao_atual = ?, responsavel = ?, status = ?, observacoes = ?, imagem = ? WHERE id_frota = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$marca_modelo, $ano_fabricacao, $placa, $numero_chassi, $tipo_veiculo, $tipo_combustivel, $quilometragem, $data_prox_rev, $historico_manutencao, $seguro, $documentacao, $localizacao_atual, $responsavel, $status, $observacoes, $imagem, $id_frota]);
    }
    
    // Model para deletar Frota
    public function excluirFrota($id_frota) {
        $sql = "DELETE FROM frota_veiculo WHERE id_frota = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_frota]);
    }
    
}
?>
