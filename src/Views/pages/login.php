<?php
    $sucess = isset($_GET['sucess']) ? $_GET['sucess'] : null;
    if($sucess == 'true'){
        echo "<script>alert('Cadastro realizado com sucesso!')</script>";
    }else if($sucess == 'false'){
        echo "<script>alert('Erro ao logar!')</script>";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/projeto/assets/css/login.css" type="text/css">
   
</head>
<body>

<header>
    <h1>Login</h1>
    <nav>
        
        <a href="./cadastro.php">Cadastro</a>
    </nav>
</header>

<main>
    <form id="loginForm" action="../banco/login.php" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Entrar</button>
    </form>
</main>

</body>
</html>
