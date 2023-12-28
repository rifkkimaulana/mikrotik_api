<?php
require('../../../config/koneksi.php');

// Periksa apakah ID dikirim melalui HTTP POST
if (isset($_POST['id'])) {
    // Ambil ID dari data POST
    $dhcpClientId = $_POST['id'];

    // Hapus DHCP Client berdasarkan ID
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
