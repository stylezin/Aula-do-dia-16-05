<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
    <style>
         .center {
            display: block;
            text-align: center;
            margin-top: 100px;
         }
         body {
            background-color: lightgreen;
         }
         input[type="submit"] {
            background-color: yellow;
         }
    </style>
    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirma_senha = $_POST["confirma_senha"];
    // Validação de Campos Obrigatórios
    if (empty($nome) || empty($email) || empty($senha) || empty($confirma_senha)) {
    echo "Por favor, preencha todos os campos.";
    exit;
    }
    // Validação de Formato de E-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Formato de e-mail inválido.";
    exit;
    }
    // Validação de Senha
    if (strlen($senha) < 8) {
    echo "A senha deve ter pelo menos 8 caracteres.";
    exit;
    }
    // Verifica se as senhas coincidem
    if ($senha !== $confirma_senha) {
    echo "As senhas não coincidem.";
    exit;
    }
    // Sanitização de Dados (removendo tags HTML e caracteres especiais)
    $nome = htmlspecialchars($nome);
    $email = htmlspecialchars($email);
    // Sanitize a senha não é recomendado, pois ela pode conter caracteres especiais importantes.
    // Processa os dados (exemplo: salvar em banco de dados)
    // Aqui você processaria os dados do formulário, como inserir em um banco de dados.
    // Exemplo de saída bem-sucedida
    echo "Registro concluído com sucesso!";
    } else {
    // Se o formulário não foi submetido corretamente
    echo "Erro: o formulário não foi enviado corretamente.";
    }
    ?>
<body>
    <form action="Registro_sucesso.php" method="POST" class="center">
        <label for="Nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite seu nome"  required>
        <br>
        <label for="Email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Digite seu email" required>
        <br>
        <label for="Senha">Senha:</label>
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
        <br>
        <label for="confirma_senha">Confirma senha:</label>
        <input type="password" id="confirma_senha" name="confirma_senha" placeholder="Digite sua senha novamente" required>
        <br>
        <br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>