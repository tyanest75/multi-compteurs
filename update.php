<?php
// update.php - incrémente, décrémente ou fixe la valeur d'un compteur
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $name = urldecode($_POST['name']);
    $file = 'data.json';
    if (!file_exists($file)) {
        echo 'Fichier data.json manquant';
        http_response_code(500);
        exit;
    }
    $data = json_decode(file_get_contents($file), true);
    if (!is_array($data) || !isset($data['compteurs'][$name])) {
        echo 'Compteur non trouvé';
        http_response_code(400);
        exit;
    }
    if (isset($_POST['set'])) {
        $val = max(0, intval($_POST['set']));
        $data['compteurs'][$name] = $val;
    } elseif (isset($_POST['op'])) {
        $op = urldecode(trim($_POST['op']));
        if (($op == '+' || $op == ' ' || $op == 'inc')) {
            $data['compteurs'][$name]++;
        }
        if ($op == '-') {
            if ($data['compteurs'][$name] > 0) $data['compteurs'][$name]--;
        }
    }
    if (file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) === false) {
        echo 'Erreur d\'écriture dans data.json';
        http_response_code(500);
        exit;
    }
    echo 'OK';
    exit;
}
echo 'Requête invalide';
http_response_code(400);
