<?php
require('../../config/koneksi.php');

$files = $API->comm('/file/print');

if ($files !== null) {
    $response = [
        'status' => true,
        'data' => $files,
    ];

    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch files.'], JSON_PRETTY_PRINT);
}
