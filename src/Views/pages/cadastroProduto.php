 <?php
    $sucess = isset($_GET['sucess']) ? $_GET['sucess'] : null;
    if($sucess == 'true'){
        echo "<script>alert('Produto cadastrado com sucesso!')</script>";
    }else if($sucess == 'false'){
        echo "<script>alert('Erro ao cadastrar!')</script>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="/projeto/assets/css/cadastroProduto.css" type="text/css">
    
</head>
<body>

<header>
    <h1>Cadastro de Produto</h1>
    <nav>
        <a href="../../../index.php">Página Inicial</a>
    </nav>
</header>

<main>
    <form id="cadastroProdutoForm" action="../banco/insertProduto.php" method="post">

        

        <label for="nomeJogo">Nome do Produto:</label>
        <input type="text" id="nomeJogo" name="nome_produto" required>

        <label for="valorJogo">Valor do Produto:</label>
        <input type="text" id="valorJogo" name="valor_produto" required>

        <label for="quantidadeJogo">Quantidade em Estoque:</label>
        <input type="text" id="quantidadeJogo" name="quantidade_produto" required>

        <label for="descricaoJogo">Descrição:</label>
        <textarea id="descricaoJogo" name="descricao" rows="4" required></textarea>



        <button type="submit">Cadastrar Produto</button>
    </form>
</main>

</body>
</html>
