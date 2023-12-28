<?php
require('../../config/koneksi.php');

$response = $API->comm('/system/reboot');

if ($response && !isset($response['!trap'])) {
    $result = [
        'status' => true,
        'message' => 'Reboot command sent successfully.'
    ];
} else {
    $result = [
        'status' => false,
        'message' => 'Failed to send reboot command.'
    ];
}

echo json_encode($result, JSON_PRETTY_PRINT);

$API->disconnect();
