<?php
require_once 'App/Model/EstoqueModel.php';

class estoqueController {
    private $estoqueModel;

    public function __construct($pdo) {
        $this->estoqueModel = new EstoqueModel($pdo);
    }
       
    public function criarEstoque($numero_referencia, $categoria, $quantidade, $preco_unitario, $fornecedor, $localizacao, $reabastecimento_minimo, $validade, $observacoes, $imagem) {
       $this->estoqueModel->criarEstoque($numero_referencia, $categoria, $quantidade, $preco_unitario, $fornecedor, $localizacao, $reabastecimento_minimo, $validade, $observacoes, $imagem);
     }

    public function listarEstoque() {
        return $this->estoqueModel->listarEstoque();
    }

    public function exibirListaEstoque() {
        $estoques = $this->estoqueModel->listarEstoque();
        include 'C:/xampp/htdocs/system_concessionaria/Resources/Views/Estoque/lista.php';
    }

    public function atualizarEstoque($id_estoque, $numero_referencia, $categoria, $quantidade, $preco_unitario, $fornecedor, $localizacao, $reabastecimento_minimo, $validade, $observacoes, $imagem) {
        $this->estoqueModel->atualizarEstoque($id_estoque, $numero_referencia, $categoria, $quantidade, $preco_unitario, $fornecedor, $localizacao, $reabastecimento_minimo, $validade, $observacoes, $imagem);
    }

    public function excluirEstoque($id_estoque) {
        $this->estoqueModel->excluirEstoque($id_estoque);
    }
}

    
?>
