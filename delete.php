<?php
// delete.php - supprime un compteur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $name = trim($_POST['name']);
    $file = 'data.json';
    $data = json_decode(file_get_contents($file), true);
    if (isset($data['compteurs'][$name])) {
        unset($data['compteurs'][$name]);
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo 'OK';
        exit;
    }
    echo 'Compteur non trouvé';
    http_response_code(404);
    exit;
}
echo 'Requête invalide';
http_response_code(400);
