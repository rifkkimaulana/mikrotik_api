<?php
require('../../../../config/koneksi.php');

$userProfiles = $API->comm('/ip/hotspot/user/profile/print');

if ($userProfiles !== null) {
    $transformedData = [
        'status' => true,
        'data' => $userProfiles,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch Hotspot user profiles.'], JSON_PRETTY_PRINT);
}
