<?php
require_once(__DIR__."/../../Controllers/produtoController.php");

if(isset($_GET['idproduto'])) {
    $idproduto = $_GET['idproduto'];
    
    $produtoController = new ProdutoController;

    $produto = $produtoController->getProdutoById($idproduto);
} else {
    header('Location: cadastroProduto.php');
    exit(); 
}

if(!$produto) {
    header('Location: cadastroProduto.php');
    exit();
}

$sucess = isset($_GET['sucess']) ? $_GET['sucess'] : null;
if($sucess == 'true'){
    echo "<script>alert('Produto editado com sucesso!')</script>";
} else if($sucess == 'false'){
    echo "<script>alert('Erro ao editar o produto!')</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="/projeto/assets/css/editarProduto.css" type="text/css">
    
</head>
<body>
    <header>
        <h1>Editar Produto</h1>
        <nav>
            <a href="../../../index.php">Página Inicial</a>
        </nav>
    </header>

    <main>
        <form id="editarProdutoForm" action="../banco/updateProduto.php" method="post">

            <label for="nomeProduto">Nome do Produto:</label>
            <input type="text" id="nomeProduto" name="nome_produto" value="<?= $produto['nome_produto'] ?>" required>

            <label for="valorProduto">Valor do Produto:</label>
            <input type="text" id="valorProduto" name="valor_produto" value="<?= $produto['valor_produto'] ?>" required>

            <label for="quantidadeProduto">Quantidade em Estoque:</label>
            <input type="text" id="quantidadeProduto" name="quantidade_produto" value="<?= $produto['quantidade_produto'] ?>" required>

            <label for="descricaoProduto">Descrição do Produto:</label>
            <textarea id="descricaoProduto" name="descricao" rows="4" required><?= $produto['descricao'] ?></textarea>

            <input type="hidden" name="idproduto" value="<?= $produto['idproduto'] ?>">

            <button type="submit">Salvar Edições</button>
        </form>
    </main>
</body>
</html>
