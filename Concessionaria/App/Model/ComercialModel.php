<?php
class ComercialModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar Comercials
    public function criarComercial($nome_cliente, $telefone_cliente, $email_cliente, $identificacao_cliente, $marca_car, $modelo_car, $caracteristicas_car, $preco_car, $numero_chassi, $data_venda, $tipo_transacao, $forma_paga, $nota_fiscal, $valor_total, $canal_venda, $vendedor, $estado_transacao) {
        $sql = "INSERT INTO comercial (nome_cliente, telefone_cliente, email_cliente, identificacao_cliente, marca_car, modelo_car, caracteristicas_car, preco_car, numero_chassi, data_venda, tipo_transacao, forma_paga, nota_fiscal, valor_total, canal_venda, vendedor, estado_transacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome_cliente, $telefone_cliente, $email_cliente, $identificacao_cliente, $marca_car, $modelo_car, $caracteristicas_car, $preco_car, $numero_chassi, $data_venda, $tipo_transacao, $forma_paga, $nota_fiscal, $valor_total, $canal_venda, $vendedor, $estado_transacao]);
    }

    // Model para listar Comercials
    public function listarComercials() {
        $sql = "SELECT * FROM comercial";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Model para atualizar Comercials
    public function atualizarComercial($id_comercial, $nome_cliente, $telefone_cliente, $email_cliente, $identificacao_cliente, $marca_car, $modelo_car, $caracteristicas_car, $preco_car, $numero_chassi, $data_venda, $tipo_transacao, $forma_paga, $nota_fiscal, $valor_total, $canal_venda, $vendedor, $estado_transacao){
        $sql = "UPDATE comercial SET nome_cliente = ?, telefone_cliente = ?, email_cliente = ?, identificacao_cliente = ?, marca_car = ?, modelo_car = ?, caracteristicas_car = ?, preco_car = ?, numero_chassi = ?, data_venda = ?, tipo_transacao = ?, forma_paga = ?, nota_fiscal = ?, valor_total = ?, canal_venda = ?, vendedor = ?, estado_transacao = ? WHERE id_comercial = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome_cliente, $telefone_cliente, $email_cliente, $identificacao_cliente, $marca_car, $modelo_car, $caracteristicas_car, $preco_car, $numero_chassi, $data_venda, $tipo_transacao, $forma_paga, $nota_fiscal, $valor_total, $canal_venda, $vendedor, $estado_transacao, $id_comercial]);
    }
    
    // Model para deletar Comercial
    public function excluirComercial($id_comercial) {
        $sql = "DELETE FROM comercial WHERE id_comercial = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_comercial]);
    }
    
}
?>
