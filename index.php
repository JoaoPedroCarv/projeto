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

        .link-comprar {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #0a0;
            color: #fff;
            padding: 0.5em;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 1em;
        }

        .link-comprar img {
            width: 1.5em;
            margin-left: 0.5em;
        }

        .link-comprar:hover {
            background-color: #0d0;
        }


        a{
            text-decoration: none;
            color: #333;
        }

        
        
    </style>
</head>
<body>

<header>
    <h1>Campo Store</h1> 
</header>

<nav>
    <a href="./src/Views/pages/cadastroProduto.php">Cadastre um Produto
    </a>
    <a href="./src/Views/pages/cadastro.php">Cadastro de Clientes</a>
    <a href="./src/Views/pages/login.php">Login</a>
    <a href="./src/Views/pages/carrinho.php">Seu Carrinho</a>
    
</nav>

<main>
    <?php foreach ($data as $row):?>
    <div class="card">
        
        <h2><?=$row['nome_produto']?></h2>
        <p><?=$row['descricao']?></p>
        <p>Valor: R$ <?=$row['valor_produto']?></p>
        <p>Quantidade em Estoque: <?=$row['quantidade_produto']?></p>
        <a href="./src/Views/pages/carrinho.php?idproduto=<?=$row['idproduto']?>" class="link-comprar">Comprar<img src="./public/icons/cart3.svg" alt=""></a>
    </div>
    <?php endforeach?>

    <!-- Adicione mais cartões conforme necessário -->
</main>

</body>
</html>
