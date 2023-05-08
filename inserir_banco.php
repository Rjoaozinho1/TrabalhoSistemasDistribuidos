<?php
// Conecta ao banco de dados
$conn = mysqli_connect("localhost", "usuario", "senha", "nome_do_banco");

// Verifica se a conexão foi bem sucedida
if (!$conn) {
	die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

// Obtém os dados do formulário
$login = $_POST['login'];
$senha = $_POST['senha'];

// Insere os dados no banco de dados
$sql = "INSERT INTO usuarios (login, senha) VALUES ('$login', '$senha')";
if (mysqli_query($conn, $sql)) {
	echo "Dados inseridos com sucesso!";
} else {
	echo "Erro ao inserir dados: " . mysqli_error($conn);
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
