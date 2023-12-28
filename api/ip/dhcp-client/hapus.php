<?php

if (isset($_POST['id'])) {
    $dhcpClientId = $_POST['id'];

    $response = $API->comm('/ip/dhcp-client/remove', [
        '.id' => $dhcpClientId,
    ]);

    if ($response) {
        echo json_encode(['status' => true, 'message' => 'DHCP Client deleted successfully.'], JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to delete DHCP Client.'], JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'ID not provided.'], JSON_PRETTY_PRINT);
}
