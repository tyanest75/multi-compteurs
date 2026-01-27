<?php
// stream.php - SSE pour push temps réel
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');
set_time_limit(0);

$file = 'data.json';
$lastHash = '';
while (true) {
    clearstatcache();
    $data = file_get_contents($file);
    $hash = md5($data);
    if ($hash !== $lastHash) {
        echo "data: $data\n\n";
        @ob_flush();
        @flush();
        $lastHash = $hash;
    }
    sleep(1);
}
