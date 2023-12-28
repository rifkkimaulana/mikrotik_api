<?php
require('../../../config/koneksi.php');

$bridgePortData = $API->comm('/interface/bridge/port/print');

if ($bridgePortData !== null) {
    $transformedData = [
        'status' => true,
        'data' => $bridgePortData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch bridge port data.'], JSON_PRETTY_PRINT);
}
