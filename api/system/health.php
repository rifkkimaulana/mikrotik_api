<?php
require('../../config/koneksi.php');

$response = $API->comm('/system/health/print');

if ($response !== null && !empty($response)) {
    $healthData = [
        'status' => true,
        'data' => $response,
    ];

    echo json_encode($healthData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch health information.'], JSON_PRETTY_PRINT);
}
