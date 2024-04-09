<?php
require_once (__DIR__.'/src/Controllers/produtoController.php');

$clienteController = new ProdutoController;
$data = $clienteController->getAll();

if($data == null){
    echo "<p>Nenhum produto cadastrado!</p>";
}

$sucess = $_GET['sucess'] ?? null;
if($sucess == 'true'){
    echo "<script>alert('Login realizado com sucesso!')</script>";
}else if($sucess == 'false'){
    echo "<script>alert('Erro ao realizar Login!')</script>";
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Vendas</title>
    <link rel="stylesheet" href="/projeto/assets/css/index.css" type="text/css">
    
</head>
<body>

<header>
    <h1>Campo Store</h1> 
</header>

<nav>
    <a href="./src/Views/pages/cadastroProduto.php">Cadastre um Produto</a>
    <a href="./src/Views/pages/login.php">Sair</a>
</nav>

<main>
    <?php foreach ($data as $row):?>
    <div class="card">
        
        <h2><?=$row['nome_produto']?></h2>
        <p><?=$row['descricao']?></p>
        <p>Valor: R$ <?=$row['valor_produto']?></p>
        <p>Quantidade em Estoque: <?=$row['quantidade_produto']?></p>
        <a href="./src/Views/pages/editarProduto.php?idproduto=<?= $row['idproduto'] ?>" class="link-editar">Editar</a>
        <a href="./src/Views/banco/removeProduto.php?idproduto=<?= $row['idproduto'] ?>" class="link-excluir">Excluir</a>

    </div>
    <?php endforeach?>
</main>

</body>
</html>
