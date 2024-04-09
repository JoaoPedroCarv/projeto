<?php
include_once '../../Controllers/produtoController.php';
$produtoController = new ProdutoController;
$idproduto = $_GET['idproduto'] ?? null;
$data = $produtoController->getProdutoById($idproduto);

$idusuario = $_SESSION['idusuario'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url("/23/assets/img/fundo4.jpg");  
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
            background-image: url("/23/assets/img/fundo2.png");  
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
            display: flex;
            justify-content: center; /* Centraliza o conteúdo horizontalmente */
            align-items: center; /* Centraliza o conteúdo verticalmente */
            height: calc(100vh - 160px); /* 160px é a soma das alturas do header e do nav */
        }

        .box {
            border: 1px solid #ddd;
            background-color: #fff;
            padding: 1em;
            margin: 1em;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px; /* Ajuste o tamanho máximo aqui */
        }

        form {
            margin-top: 1em;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            margin-bottom: 0.5em;
            padding: 0.5em;
        }

        button {
            padding: 0.5em 1em;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
    <h1>Carrinho de Compras</h1>
</header>

<nav>
    <a href="/23/index.php">Produtos</a>
 
</nav>

<main>
    <div class="box">
        <!-- Conteúdo do Produto -->
        <?php if (!empty($data)): ?>
            <h2 id="nome"><?= $data['nome_produto'] ?></h2>
            <p><?= $data['descricao'] ?></p>
            <p id="valor">Valor: R$ <?= $data['valor_produto'] ?></p>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    </div>

    <div class="box">
        <!-- Conteúdo do Valor Total -->
        <h2>Valor Total</h2>
        <p>Preço do Produto: R$ <?= !empty($data) ? $data['valor_produto'] : '0.00' ?></p>
        <form id="formFinalizar" method="post" action="../php/insertCompra.php">
            <input type="hidden" name="idproduto" value="<?= $data['idproduto'] ?? '' ?>">
            <input type="hidden" name="idusuario" value="<?= $idusuario ?? '' ?>">
            <input type="hidden" name="valor_compra" value="<?= !empty($data) ? $data['valor_produto'] : '0.00' ?>">
            
            <!-- Botão de finalizar compra -->
            <button id="botaoFinalizar" type="submit">Finalizar Compra</button>
            
        </form>
    </div>
</main>

</body>
</html>
