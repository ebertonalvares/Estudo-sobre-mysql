<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form action="processar_formulario.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" required><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" required><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br>

        <label for="comentario">Comentário:</label>
        <textarea id="comentario" name="comentario" rows="4" cols="50"></textarea><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
