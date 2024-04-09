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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url("/projeto/assets/img/fundo4.jpg");  
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
            background-image: url("/projeto/assets/img/fundo2.png");  
        }

        nav {
            display: flex;
            background-color: #444;
            padding: 0.5em;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 0.5em 1em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #555;
        }

        main {
            max-width: 600px;
            margin: 2em auto;
            padding: 1em;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        form {
            display: grid;
            gap: 1em;
        }

        label {
            display: block;
            margin-bottom: 0.5em;
        }

        input {
            width: 100%;
            padding: 0.5em;
            box-sizing: border-box;
        }

        textarea {
            width: 100%;
            padding: 0.5em;
            box-sizing: border-box;
        }

        button {
            padding: 0.5em 1em;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
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
