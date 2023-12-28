<?php
require('../../../../config/koneksi.php');

$ipBindingData = $API->comm('/ip/hotspot/ip-binding/print');

if ($ipBindingData !== null) {
    $transformedData = [
        'status' => true,
        'data' => $ipBindingData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch Hotspot IP Binding data.'], JSON_PRETTY_PRINT);
}
