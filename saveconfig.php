<?php
// Recebe os dados da configuração do jogo
$configData = $_POST['configData'];
$playerName = $_POST['playerName'];

// Conecta ao banco de dados (substitua 'localhost', 'root', '' e 'dbname' com suas configurações)
$conn = new mysqli('localhost', 'root', '', 'dbname');

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Prepara a instrução SQL para inserir ou atualizar os dados da configuração
$sql = "INSERT INTO player_configs (player_name, config_data) VALUES ('$playerName', '$configData')
        ON DUPLICATE KEY UPDATE config_data = '$configData'";

// Executa a instrução SQL
if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Erro ao salvar configuração: ' . $conn->error]);
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
