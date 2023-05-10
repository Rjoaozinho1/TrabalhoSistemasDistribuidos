<?php
// configurações de conexão com o banco de dados
$host = "localhost";
$port = 3306;
$dbname = "joaopedro";
$username = "root";
$password = "";

// estabelece a conexão com o banco de dados
$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

// verifica se os dados foram enviados pelo método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // obtém os valores dos campos do formulário
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];

    // prepara a consulta SQL para inserir os dados na tabela "usuarios"
    $sql = "INSERT INTO usuarios (nome, telefone, cpf, endereco) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    // executa a consulta SQL com os valores dos campos do formulário
    $stmt->execute([$nome, $telefone, $cpf, $endereco]);

    // redireciona o usuário para uma página de confirmação ou exibe uma mensagem de sucesso
    if ($resultado) {
        header("Location: sucesso.html");
    } else {
        header("Location: falha.html");
    }
    exit();
}
?>