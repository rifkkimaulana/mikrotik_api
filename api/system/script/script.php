<?php
require('../../../config/koneksi.php');

$scripts = $API->comm('/system/script/print');

if ($scripts !== null) {
    $response = [
        'status' => true,
        'data' => $scripts,
    ];

    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch script information.'], JSON_PRETTY_PRINT);
}
