<?php
class ContaModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarConta($fornecedores, $salarios_benef, $aluguel, $contas_publicas, $impostos, $emprestimos, $manutencao, $seguros, $marketing, $despesas_adm, $logistica, $pesquisa, $garantia) {
        $sql = "INSERT INTO contas (fornecedores, salarios_benef, aluguel, contas_publicas, impostos, emprestimos, manutencao, seguros, marketing, despesas_adm, logistica, pesquisa, garantia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$fornecedores, $salarios_benef, $aluguel, $contas_publicas, $impostos, $emprestimos, $manutencao, $seguros, $marketing, $despesas_adm, $logistica, $pesquisa, $garantia]);
    }

    public function listarContas() {
        $sql = "SELECT * FROM contas";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Implementar métodos para atualizar e excluir contaes
    public function atualizarConta($id_conta, $fornecedores, $salarios_benef, $aluguel, $contas_publicas, $impostos, $emprestimos, $manutencao, $seguros, $marketing, $despesas_adm, $logistica, $pesquisa, $garantia){
        $sql = "UPDATE contas SET fornecedores = ?, salarios_benef = ?, aluguel = ?, contas_publicas = ?, impostos = ?, emprestimos = ?, manutencao = ?, seguros = ?, marketing = ?, despesas_adm = ?, logistica = ?, pesquisa = ?, garantia = ? WHERE id_conta = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$fornecedores, $salarios_benef, $aluguel, $contas_publicas, $impostos, $emprestimos, $manutencao, $seguros, $marketing, $despesas_adm, $logistica, $pesquisa, $garantia, $id_conta]);
    }
    

    public function excluirConta($id_conta) {
        $sql = "DELETE FROM contas WHERE id_conta = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_conta]);
    }
}
?>