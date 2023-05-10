<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "joaopedro";

// cria uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

// recebe os dados do formulário
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];

// insere os dados no banco de dados
$sql = "INSERT INTO usuarios (nome, telefone, cpf, endereco) VALUES ('$nome', '$telefone', '$cpf', '$endereco')";

if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

// fecha a conexão com o banco de dados
$conn->close();
?>
