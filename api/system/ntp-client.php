<?php
require('../../config/koneksi.php');

$response = $API->comm('/system/ntp/client/print');

if ($response !== null && !empty($response)) {
    $ntpClientData = [
        'status' => true,
        'data' => $response,
    ];

    echo json_encode($ntpClientData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch NTP Client information.'], JSON_PRETTY_PRINT);
}
