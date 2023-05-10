const mysql = require('mysql2');

// Configuração da conexão com o banco de dados
const conexao = mysql.createConnection({
    host: 'localhost',
    port: 3306,
    user: 'root',
    password: '',
    database: 'usuarios'
});

// Event listener para o botão enviar
document.getElementById('enviar').addEventListener('click', () => {
    // Obtém os valores dos campos do formulário
    const nome = document.getElementById('nome').value;
    const telefone = document.getElementById('telefone').value;
    const cpf = document.getElementById('cpf').value;
    const endereco = document.getElementById('endereco').value;

    // Insere os dados no banco de dados
    const sql = `INSERT INTO usuarios (nome, telefone, cpf, endereco) VALUES (?, ?, ?, ?)`;
    const valores = [nome, telefone, cpf, endereco];
    conexao.query(sql, valores, (err, result) => {
        if (err) {
            console.error(err);
        } else {
            console.log(result);
        }
    });
});