<?php
require('../../../../config/koneksi.php');

$hotspotProfiles = $API->comm('/ip/hotspot/profile/print');

if ($hotspotProfiles !== null) {
    $transformedData = [
        'status' => true,
        'data' => $hotspotProfiles,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch Hotspot server profiles.'], JSON_PRETTY_PRINT);
}
