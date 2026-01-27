<?php
// add.php - ajoute un nouveau compteur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $name = trim($_POST['name']);
    if ($name === '') exit;
    $file = 'data.json';
    $data = json_decode(file_get_contents($file), true);
    if (!isset($data['compteurs'][$name])) {
        $data['compteurs'][$name] = 0;
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
