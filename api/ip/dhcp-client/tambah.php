<?php
require('../../../config/koneksi.php');

if (
    isset($_POST['interface-id']) &&
    isset($_POST['add-default-route']) &&
    isset($_POST['use-peer-dns']) &&
    isset($_POST['use-peer-ntp'])
) {
    $interfaceId = $_POST['interface-id'];
    $addDefaultRoute = ($_POST['add-default-route'] === 'yes') ? 'yes' : 'no';
    $usePeerDns = ($_POST['use-peer-dns'] === 'enable') ? 'yes' : 'no';
    $usePeerNtp = ($_POST['use-peer-ntp'] === 'enable') ? 'yes' : 'no';

    $response = $API->comm('/ip/dhcp-client/add', [
        'interface' => $interfaceId,
        'add-default-route' => $addDefaultRoute,
        'use-peer-dns' => $usePeerDns,
        'use-peer-ntp' => $usePeerNtp,
    ]);

    if ($response) {
        echo json_encode(['status' => true, 'message' => 'DHCP Client added successfully.'], JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to add DHCP Client.'], JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Missing required parameters.'], JSON_PRETTY_PRINT);
}
