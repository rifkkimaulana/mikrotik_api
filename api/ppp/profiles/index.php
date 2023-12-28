<?php
require('../../../config/koneksi.php');

$comm = $API->comm('/ppp/profile/print');

if ($comm !== null) {
    $data = [
        'status' => true,
        'data' => $comm,
    ];

    echo json_encode($data, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch PPP interface data.'], JSON_PRETTY_PRINT);
}
