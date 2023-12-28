<?php
require('../../config/koneksi.php');

$packages = $API->comm('/system/package/print');

if ($packages !== null) {
    $response = [
        'status' => true,
        'data' => $packages,
    ];

    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch package information.'], JSON_PRETTY_PRINT);
}
