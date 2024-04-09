<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="/projeto/assets/css/cadastro.css" type="text/css">
</head>
<body>

<header>
    <h1>Cadastro de Usuário</h1>
    <nav>
        <a href="login.php">Login</a>
    </nav>
</header>

<main>
    <form id="cadastroForm" method="post" action="../banco/insertUser.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" required oninput="consultaCEP()">

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" readonly>

        <button class="submit" type="submit">Cadastrar</button>
    </form>
</main>

<script>
    function consultaCEP() {
        var cep = document.getElementById('cep').value;
        var enderecoInput = document.getElementById('endereco');

        cep = cep.replace(/\D/g, '');

        if (cep.length === 8) {
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';

            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open('GET', url);
            xmlHttp.onreadystatechange = function () {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    var data = JSON.parse(xmlHttp.responseText);
                    if (data.erro) {
                        alert('CEP não encontrado.');
                    } else {
                        enderecoInput.value = data.logradouro + ', ' + data.bairro + ', ' + data.localidade + ' - ' + data.uf;
                        enderecoInput.style.opacity = 0.7;
                    }
                }
            };
            xmlHttp.send();
        } else {
            enderecoInput.style.opacity = 1;
        }
    }
</script>

</body>
</html>
