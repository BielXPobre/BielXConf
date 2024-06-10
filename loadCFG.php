<?php
$request_method = $_SERVER["REQUEST_METHOD"];
if ($request_method == "GET") {
    $playerName = $_GET['playerName'];
    $configName = $_GET['configName'];

    // Aqui você pode carregar a configuração com o nome especificado
    // Por exemplo, carregar de um arquivo com o nome da configuração
    $configData = file_get_contents("configs/$configName.json");

    // Responda com os dados da configuração ou uma mensagem de erro se não encontrada
    if ($configData !== false) {
        echo json_encode(['configData' => $configData]);
    } else {
        echo json_encode(['error' => 'Configuração não encontrada']);
    }
} else {
    // Responda com um erro se o método de requisição for incorreto
    echo json_encode(['error' => 'Método de requisição incorreto']);
}
?>
