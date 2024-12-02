<?php
$servername = "localhost"; // ou o IP do seu servidor
$username = "root"; // seu usuário do MySQL
$password = ""; // sua senha do MySQL
$dbname = "meu_projeto"; // nome do seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$numero = $_POST['numero'];

// Preparar e vincular
$stmt = $conn->prepare("INSERT INTO tb_carrinhodecompra (nome, email, numero) VALUES (?, ?, ?)");
$stmt->bind_param("i", $nome, $email, $numero);

// Executar e verificar
if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

// Fechar conexão
$stmt->close();
$conn->close();
?>

