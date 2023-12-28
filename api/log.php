<?php
require('../config/koneksi.php');

$logData = $API->comm('/log/print');

if ($logData && !isset($logData['!trap'])) {
    $result = [
        'status' => true,
        'data' => $logData
    ];
} else {
    $result = [
        'status' => false,
        'message' => 'Failed to retrieve log data.'
    ];
}

echo json_encode($result, JSON_PRETTY_PRINT);

$API->disconnect();
