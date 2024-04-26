<?php
require_once 'App\Model\ComercialModel.php';

class ComercialController {
    private $comercialModel;

    public function __construct($pdo) {
        $this->comercialModel = new ComercialModel($pdo);
    }

    public function criarComercial($nome_cliente, $telefone_cliente, $email_cliente, $identificacao_cliente, $marca_car, $modelo_car, $caracteristicas_car, $preco_car, $numero_chassi, $data_venda, $tipo_transacao, $forma_paga, $nota_fiscal, $valor_total, $canal_venda, $vendedor, $estado_transacao) {
        $this->comercialModel->criarComercial($nome_cliente, $telefone_cliente, $email_cliente, $identificacao_cliente, $marca_car, $modelo_car, $caracteristicas_car, $preco_car, $numero_chassi, $data_venda, $tipo_transacao, $forma_paga, $nota_fiscal, $valor_total, $canal_venda, $vendedor, $estado_transacao);
    }

    public function listarComercials() {
        return $this->comercialModel->listarComercials();
    }

    public function exibirListaComercials() {
        $comercials = $this->comercialModel->listarComercials();
        include 'App/View/Usuarios/lista.php';
    }

    public function atualizarComercial($id_comercial, $nome_cliente, $telefone_cliente, $email_cliente, $identificacao_cliente, $marca_car, $modelo_car, $caracteristicas_car, $preco_car, $numero_chassi, $data_venda, $tipo_transacao, $foma_paga, $nota_fiscal, $valor_total, $canal_venda, $vendedor, $estado_transacao) {
        $this->comercialModel->atualizarComercial($id_comercial, $nome_cliente, $telefone_cliente, $email_cliente, $identificacao_cliente, $marca_car, $modelo_car, $caracteristicas_car, $preco_car, $numero_chassi, $data_venda, $tipo_transacao, $foma_paga, $nota_fiscal, $valor_total, $canal_venda, $vendedor, $estado_transacao);
    }
    
    public function excluirComercial ($id_comercial) {
        $this->comercialModel->excluirComercial($id_comercial);
    }
}
?>
