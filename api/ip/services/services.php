<?php
require('../../../config/koneksi.php');

$ipServicesData = $API->comm('/ip/service/print');

if ($ipServicesData !== null) {
    $transformedData = [
        'status' => true,
        'data' => $ipServicesData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch IP services data.'], JSON_PRETTY_PRINT);
}
