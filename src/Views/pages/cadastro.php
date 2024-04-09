<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
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
            grid-template-columns: 1fr 1fr;
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

        button {
            grid-column: span 2;
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
        .submit{
            height: 40px;
        }
    </style>
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
