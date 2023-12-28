<?php
// Configurações de conexão ao banco de dados
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "meuprimeirobancodedados";

// Cria a conexão variavel $conn = conexao 
// new mysqli(...): Isso cria uma nova instância da classe mysqli. A classe mysqli é parte da biblioteca MySQLi (Melhorada),
// que é uma API (Interface de Programação de Aplicações) em PHP para interagir com o banco de dados MySQL.
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
// $conn->connect_error: O objeto $conn é a instância da classe mysqli que representa a conexão com o banco de dados.
// O método connect_error é usado para obter uma descrição do erro que ocorreu durante a tentativa de conexão.
// Se a conexão foi estabelecida com sucesso, $conn->connect_error será uma string vazia.
// if ($conn->connect_error) { ... }: Esta é uma estrutura condicional que avalia se o valor retornado 
// por $conn->connect_error é verdadeiro (não vazio). Em PHP, uma string vazia é considerada falsa em um contexto booleano,
// então a condição dentro do if será verdadeira apenas se houver um erro de conexão.
// die("Conexão falhou: " . $conn->connect_error);: Se a condição no if for verdadeira (indicando que houve um erro de conexão),
// o código dentro do bloco { ... } será executado. O die é uma função que encerra imediatamente a execução do script
// e exibe uma mensagem para o usuário. Nesse caso, a mensagem exibida é "Conexão falhou:" 
// seguida pela descrição do erro obtida de $conn->connect_error.
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica -> se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $cidade = $_POST["cidade"];
    $idade = $_POST["idade"];
    $comentario = $_POST["comentario"];

    // Monta a query SQL para inserir dados na tabela 'usuarios'
    // Uma "query" (ou "consulta" em português) refere-se a uma instrução 
    // ou comando utilizado para interagir com um banco de dados.
    // Essa instrução é projetada para recuperar, inserir, atualizar ou excluir dados em um banco de dados. 
    $sql = "INSERT INTO usuarios (nome, sobrenome, email, cidade, idade, comentario) 
            VALUES ('$nome', '$sobrenome', '$email', '$cidade', $idade, '$comentario')";

    // Executa a query e verifica se foi bem-sucedida
    // $conn->query($sql): Aqui, $conn é a instância da classe mysqli que representa a conexão com o banco de dados.
    // O método query($sql) é usado para executar uma consulta SQL no banco de dados.
    // A variável $sql geralmente contém a instrução SQL que você deseja executar, como uma inserção (INSERT INTO...),
    // atualização (UPDATE...), ou exclusão (DELETE FROM...).
    //  === TRUE: O operador de igualdade estrita (===) compara tanto o valor quanto o tipo de dados. 
    // Neste caso, a condição está verificando se o resultado da execução da consulta é estritamente igual a TRUE.
    // Isso significa que a consulta SQL foi executada com sucesso.
    // echo "Dados inseridos com sucesso no banco de dados!";: Se a condição for verdadeira, ou seja, 
    // se a consulta for bem-sucedida, uma mensagem de sucesso é exibida.
    //  Essa mensagem indica que os dados foram inseridos com sucesso no banco de dados.
    // else { echo "Erro ao inserir dados: " . $conn->error; }: Se a condição for falsa,
    // ou seja, se houver um erro durante a execução da consulta, o bloco else é executado. 
    // Nesse caso, uma mensagem de erro é exibida, incluindo detalhes sobre o erro obtido através de $conn->error.
    // Essa informação é útil para depuração e diagnóstico de problemas durante a interação com o banco de dados.
    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso no banco de dados!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
// instancia = Em programação orientada a objetos, o termo "instância" se refere a um objeto específico 
// criado a partir de uma classe. Uma classe é uma estrutura que define um tipo de objeto,
//  especificando quais propriedades (também conhecidas como atributos) e métodos (funções associadas à classe) o objeto terá.
?>
