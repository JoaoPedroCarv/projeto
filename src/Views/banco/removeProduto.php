<?php

require_once(__DIR__."/../../Controllers/produtoController.php");
require_once(__DIR__."/../../Models/produtoModel.php");

if(isset($_GET['idproduto'])) {
    $idproduto = $_GET['idproduto'];
   
    $produtoController = new ProdutoController;

    $produtoController->deleteProduto($idproduto);
} 
?>
