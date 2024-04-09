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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            
            background-image: url("./assets/img/fundo4.jpg");   
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
            background-image: url("./assets/img/fundo2.png");   
            
        }

        nav {
            display: flex;
            justify-content: space-around;
            background-color: #444;
            padding: 0.5em;
        }

        nav a {
            color: #fff;
            text-decoration: none;
        }

        main {
            padding: 1em;
        }

        .card {
            border: 1px solid #ddd;
            background-color: #fff;
            padding: 1em;
            margin: 1em auto; 
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px; 
            width: 100%; 
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 1em;
        }

        .link-editar {
        display: inline-block;
        padding: 0.5em 1em;
        background-color: #007bff; 
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        }

        .link-editar:hover {
        background-color: #0056b3; 
        }

        a{
            text-decoration: none;
            color: #333;
        }

        .link-excluir {
        display: inline-block;
        padding: 0.5em 1em;
        background-color: #dc3545; 
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        margin-left: 0.5em; 
    }

    .link-excluir:hover {
        background-color: #c82333; 
    }

    </style>
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
        <a href="./src/Views/php/removeProduto.php?idproduto=<?= $row['idproduto'] ?>" class="link-excluir">Excluir</a>

    </div>
    <?php endforeach?>
</main>

</body>
</html>
