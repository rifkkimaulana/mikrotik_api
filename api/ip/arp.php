<?php
require('../../config/koneksi.php');

$arpData = $API->comm('/ip/arp/print');

if ($arpData !== null) {
    $transformedData = [
        'status' => true,
        'data' => $arpData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch ARP data.'], JSON_PRETTY_PRINT);
}
