<?php
require('../../config/koneksi.php');

$response = $API->comm('/system/ntp/server/print');

if ($response !== null && !empty($response)) {
    $ntpServerData = [
        'status' => true,
        'data' => $response,
    ];

    echo json_encode($ntpServerData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch NTP Client information.'], JSON_PRETTY_PRINT);
}
