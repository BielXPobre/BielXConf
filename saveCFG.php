<?php
$request_method = $_SERVER["REQUEST_METHOD"];
if ($request_method == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $configName = $data['configName'];
    $playerName = $data['playerName'];
    $configData = $data['configData'];

    // Aqui você pode salvar a configuração com o nome especificado
    // Por exemplo, salvar em um arquivo com o nome da configuração
    file_put_contents("configs/$configName.json", $configData);

    // Responda com uma mensagem de sucesso
    echo json_encode(['success' => true]);
} else {
    // Responda com um erro se o método de requisição for incorreto
    echo json_encode(['error' => 'Método de requisição incorreto']);
}
?>
