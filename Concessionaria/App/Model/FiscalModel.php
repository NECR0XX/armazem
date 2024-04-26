<?php
class FiscalModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar Fiscals
    public function criarFiscal($data, $descricao, $valor, $tipo, $cliente_fornecedor, $nota_fiscal, $imposto, $metodo_pagamento, $codigo_fiscal, $contas_contabeis, $localizacao, $responsavel, $status, $observacoes) {
        $sql = "INSERT INTO fiscal (data, descricao, valor, tipo, cliente_fornecedor, nota_fiscal, imposto, metodo_pagamento, codigo_fiscal, contas_contabeis, localizacao, responsavel, status, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data, $descricao, $valor, $tipo, $cliente_fornecedor, $nota_fiscal, $imposto, $metodo_pagamento, $codigo_fiscal, $contas_contabeis, $localizacao, $responsavel, $status, $observacoes]);
    }

    // Model para listar Fiscals
    public function listarFiscals() {
        $sql = "SELECT * FROM fiscal";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Model para atualizar Fiscals
    public function atualizarFiscal($id_fiscal, $data, $descricao, $valor, $tipo, $cliente_fornecedor, $nota_fiscal, $imposto, $metodo_pagamento, $codigo_fiscal, $contas_contabeis, $localizacao, $responsavel, $status, $observacoes){
        $sql = "UPDATE fiscal SET  = ?, data = ?, descricao = ?, valor = ?, tipo = ?, cliente_fornecedor = ?, nota_fiscal = ?, imposto = ?, metodo_pagamento = ?, codigo_fiscal = ?, contas_contabeis = ?, localizacao = ?, responsavel = ?, status = ?, observacoes = ? WHERE id_fiscal = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data, $descricao, $valor, $tipo, $cliente_fornecedor, $nota_fiscal, $imposto, $metodo_pagamento, $codigo_fiscal, $contas_contabeis, $localizacao, $responsavel, $status, $observacoes, $id_fiscal]);
    }
    
    // Model para deletar Fiscal
    public function excluirFiscal($id_fiscal) {
        $sql = "DELETE FROM fiscal WHERE id_fiscal = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_fiscal]);
    }
    
}
?>
