<?php
// Configurações de conexão ao banco de dados
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "meuprimeirobancodedados";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $cidade = $_POST["cidade"];
    $idade = $_POST["idade"];
    $comentario = $_POST["comentario"];

    // Monta a query SQL para inserir dados na tabela 'usuarios'
    $sql = "INSERT INTO usuarios (nome, sobrenome, email, cidade, idade, comentario) 
            VALUES ('$nome', '$sobrenome', '$email', '$cidade', $idade, '$comentario')";

    // Executa a query e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso no banco de dados!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
