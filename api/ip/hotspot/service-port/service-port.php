<?php
require('../../../../config/koneksi.php');

$hotspotServicePortData = $API->comm('/ip/hotspot/service-port/print');

if ($hotspotServicePortData !== null) {
    $transformedData = [
        'status' => true,
        'data' => $hotspotServicePortData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch Hotspot Service Port data.'], JSON_PRETTY_PRINT);
}
