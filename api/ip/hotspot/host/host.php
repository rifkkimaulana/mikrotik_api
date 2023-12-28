<?php
require('../../../../config/koneksi.php');

$hostData = $API->comm('/ip/hotspot/host/print');

if ($hostData !== null) {
    $transformedData = [
        'status' => true,
        'data' => $hostData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch Hotspot Host data.'], JSON_PRETTY_PRINT);
}
