<?php
require('../../../../config/koneksi.php');

$hotspotUserData = $API->comm('/ip/hotspot/user/print');

if ($hotspotUserData !== null) {
    $transformedData = [
        'status' => true,
        'data' => $hotspotUserData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch Hotspot user data.'], JSON_PRETTY_PRINT);
}
