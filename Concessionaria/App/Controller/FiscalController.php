<?php
require_once 'App/Model/FiscalModel.php';


class FiscalController {
    private $fiscalModel;

    public function __construct($pdo) {

        $this->fiscalModel = new FiscalModel($pdo);
    }

    public function criarFiscal($data, $valor, $tipo, $cliente_fornecedor, $nota_fiscal, $imposto, $metodo_pagamento, $codigo_fiscal, $contas_contabeis, $localizacao, $responsavel, $status, $observacoes) {
        $this->fiscalModel->criarFiscal($data, $valor, $tipo, $cliente_fornecedor, $nota_fiscal, $imposto, $metodo_pagamento, $codigo_fiscal, $contas_contabeis, $localizacao, $responsavel, $status, $observacoes);
    }

    public function listarFiscals() {
        return $this->fiscalModel->listarFiscals();
    }

    public function exibirListaFiscals() {
        $fiscals = $this->fiscalModel->listarFiscals();
        include '../../Resources/Views/Fiscal/lista.php';
    }

    public function atualizarFiscal($id_fiscal, $data, $valor, $tipo, $cliente_fornecedor, $nota_fiscal, $imposto, $metodo_pagamento, $codigo_fiscal, $contas_contabeis, $localizacao, $responsavel, $status, $observacoes) {
        $this->fiscalModel->atualizarFiscal($id_fiscal, $data, $valor, $tipo, $cliente_fornecedor, $nota_fiscal, $imposto, $metodo_pagamento, $codigo_fiscal, $contas_contabeis, $localizacao, $responsavel, $status, $observacoes);
    }
    
    public function excluirFiscal ($id_fiscal) {
        $this->fiscalModel->excluirFiscal($id_fiscal);
    }
}
?>
