<?php
require('../../../../config/koneksi.php');

$id = $_POST['id'];
$macAddress = $_POST['mac_address'];
$address = $_POST['address'];
$toAddress = $_POST['to_address'];
$server = $_POST['server'];
$type = $_POST['type'];
$comment = $_POST['comment'];

$editBinding = $API->comm('/ip/hotspot/ip-binding/set', [
    '.id' => $id,
    'mac-address' => $macAddress,
    'address' => $address,
    'to-address' => $toAddress,
    'server' => $server,
    'type' => $type,
    'comment' => $comment,
]);

if ($editBinding !== null && !isset($editBinding['!trap'])) {
    $status = true;
    $message = 'IP binding updated successfully.';
} else {
    $status = false;
    $message = 'Failed to update IP binding.';
}

echo json_encode(['status' => $status, 'message' => $message], JSON_PRETTY_PRINT);
