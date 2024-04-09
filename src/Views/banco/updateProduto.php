<?php
require_once(__DIR__."/../../Controllers/produtoController.php");
require_once(__DIR__."/../../Models/produtoModel.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produtoController = new ProdutoController;

    $produtoModel = new ProdutoModel;

    $produtoModel->setId($_POST['idproduto'])
                 ->setNomeProduto($_POST['nome_produto'])
                 ->setDescricao($_POST['descricao'])
                 ->setValorProduto($_POST['valor_produto'])
                 ->setQuantidadeProduto($_POST['quantidade_produto']);

    $produtoController->updateProduto($produtoModel);
} 
?>
