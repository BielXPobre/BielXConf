<?php
// Recebe o nome do jogador
$playerName = $_GET['playerName'];

// Conecta ao banco de dados (substitua 'localhost', 'root', '' e 'dbname' com suas configurações)
$conn = new mysqli('localhost', 'root', '', 'dbname');

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Prepara a instrução SQL para buscar os dados da configuração
$sql = "SELECT config_data FROM player_configs WHERE player_name = '$playerName'";

// Executa a instrução SQL
$result = $conn->query($sql);

// Verifica se há resultados e retorna os dados da configuração
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['configData' => $row['config_data']]);
} else {
    echo json_encode(['error' => 'Configuração não encontrada.']);
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
