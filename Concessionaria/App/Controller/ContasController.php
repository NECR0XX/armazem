<?php
require_once 'App/Model/ContasModel.php';


class contasController {
    private $contaModel;

    public function __construct($pdo) {
        $this->contaModel = new ContaModel($pdo);
    }

    public function criarConta($fornecedores, $salarios_benef, $aluguel, $contas_publicas, $impostos, $emprestimos, $manutencao, $seguros, $marketing, $despesas_adm, $logistica, $pesquisa, $garantia) {
        $this->contaModel->criarConta($fornecedores, $salarios_benef, $aluguel, $contas_publicas, $impostos, $emprestimos, $manutencao, $seguros, $marketing, $despesas_adm, $logistica, $pesquisa, $garantia);
    }

    public function listarContas() {
        return $this->contaModel->listarContas();
    }

    public function exibirListaContaes() {
        $contaes = $this->contaModel->listarContas();
        include 'C:/xampp/htdocs/system_concessionaria/Resources/Views/Contas/lista.php';
    }

    public function atualizarConta ($id_conta, $fornecedores, $salarios_benef, $aluguel, $contas_publicas, $impostos, $emprestimos, $manutencao, $seguros, $marketing, $despesas_adm, $logistica, $pesquisa, $garantia) {
        $this->contaModel->atualizarConta($id_conta, $fornecedores, $salarios_benef, $aluguel, $contas_publicas, $impostos, $emprestimos, $manutencao, $seguros, $marketing, $despesas_adm, $logistica, $pesquisa, $garantia);
    }
    public function excluirConta ($id_conta) {
        $this->contaModel->excluirConta($id_conta);
    }
}

    
?>