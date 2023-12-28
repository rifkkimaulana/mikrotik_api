<?php
require('../../../../config/koneksi.php');

$selectedIds = isset($_POST['selectedIds']) ? $_POST['selectedIds'] : [];

if (empty($selectedIds)) {
    echo json_encode(['status' => false, 'message' => 'Selected IDs are missing.'], JSON_PRETTY_PRINT);
    exit();
}

foreach ($selectedIds as $hostId) {
    $API->comm('/ip/hotspot/host/remove', ['.id' => $hostId]);
}

$removedHosts = $API->comm('/ip/hotspot/host/print', ['?id' => implode(',', $selectedIds)]);

if (empty($removedHosts)) {
    echo json_encode(['status' => true, 'message' => 'Hosts removed successfully.'], JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to remove selected hosts.'], JSON_PRETTY_PRINT);
}
