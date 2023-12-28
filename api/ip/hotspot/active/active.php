<?php
require('../../../../config/koneksi.php');

$hotspotData = $API->comm('/ip/hotspot/active/print');

if ($hotspotData !== null) {
    $transformedData = [
        'status' => true,
        'data' => $hotspotData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch Hotspot data.'], JSON_PRETTY_PRINT);
}
