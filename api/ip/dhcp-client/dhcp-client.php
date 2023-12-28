<?php
require('../../../config/koneksi.php');

$dhcpClientData = $API->comm('/ip/dhcp-client/print');

if ($dhcpClientData !== null) {
    $transformedData = [
        'status' => true,
        'data' => $dhcpClientData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch DHCP Client data.'], JSON_PRETTY_PRINT);
}
