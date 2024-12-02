<?php
include 'conexao.php';
 
$data = json_decode(file_get_contents("php://input"), true);
 
if (!$data) {
    echo json_encode(['message' => 'Dados inválidos.']);
    exit;
}
 
try {
    foreach ($data as $produto) {
        $stmt = $pdo->prepare("INSERT INTO vendas (id, nome, preco)
                               VALUES (?, ?, ?)");
   
        $stmt->execute([$produto['id'], $produto['nome'], $produto['preco']]);
    }
 
    echo json_encode(['message' => 'Compra finalizada com sucesso!']);
} catch (PDOException $e) {
    echo json_encode(['message' => 'Erro ao salvar a compra: ' . $e->getMessage()]);
}
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loja";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}


$data = json_decode(file_get_contents('php://input'), true);
$cart = $data['cart'];


foreach ($cart as $item) {
  $sql = "INSERT INTO pedidos (id, nome, preco, estoque) VALUES ('" . $item['id'] . "', '" . $conn->real_escape_string($item['name']) . "', " . $item['price'] . ", " . $item['quantity'] . ")";

  if ($conn->query($sql) === TRUE) {

  } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
    $conn->close();
    exit(); 
  }
}

echo "Compra finalizada com sucesso!";

$conn->close();
?>