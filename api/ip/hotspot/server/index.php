<?php
require('../../../../config/koneksi.php');

$hotspotServerData = $API->comm('/ip/hotspot/print');

if ($hotspotServerData !== null) {
    $transformedData = [
        'status' => true,
        'data' => $hotspotServerData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch Hotspot Server data.'], JSON_PRETTY_PRINT);
}
