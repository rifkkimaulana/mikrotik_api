<?php
require('../../../config/koneksi.php');

$bridgeData = $API->comm('/interface/bridge/print');

if ($bridgeData !== null) {
    $transformedData = [
        'status' => true,
        'data' => $bridgeData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch bridge data.'], JSON_PRETTY_PRINT);
}
