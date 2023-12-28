<?php
require('../../../../config/koneksi.php');

$walledGardenData = $API->comm('/ip/hotspot/walled-garden/ip/print');

if ($walledGardenData !== null) {
    $transformedData = [
        'status' => true,
        'data' => $walledGardenData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch Walled Garden data.'], JSON_PRETTY_PRINT);
}
