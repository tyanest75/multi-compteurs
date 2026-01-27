<?php
// update_name.php - renomme un compteur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['old']) && isset($_POST['new'])) {
    $old = trim($_POST['old']);
    $new = trim($_POST['new']);
    if ($old === '' || $new === '') {
        echo 'Nom invalide';
        http_response_code(400);
        exit;
    }
    $file = 'data.json';
    $data = json_decode(file_get_contents($file), true);
    if (!isset($data['compteurs'][$old])) {
        echo 'Ancien compteur non trouvé';
        http_response_code(404);
        exit;
    }
    if (isset($data['compteurs'][$new])) {
        echo 'Un compteur avec ce nom existe déjà';
        http_response_code(409);
        exit;
    }
    $data['compteurs'][$new] = $data['compteurs'][$old];
    unset($data['compteurs'][$old]);
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo 'OK';
    exit;
}
echo 'Requête invalide';
http_response_code(400);
