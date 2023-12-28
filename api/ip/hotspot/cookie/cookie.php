<?php
require('../../../../config/koneksi.php');

$cookieData = $API->comm('/ip/hotspot/cookie/print');

if ($cookieData !== null) {
    // Transformasi data jika diperlukan
    $transformedData = [
        'status' => true,
        'data' => $cookieData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch Cookie data.'], JSON_PRETTY_PRINT);
}
