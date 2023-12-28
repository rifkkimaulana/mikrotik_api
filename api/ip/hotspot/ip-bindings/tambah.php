<?php
require('../../../../config/koneksi.php');

$macAddress = $_POST['mac_address'];
$address = $_POST['address'];
$toAddress = $_POST['to_address'];
$server = $_POST['server'];
$type = $_POST['type'];
$comment = $_POST['comment'];

$addBinding = $API->comm('/ip/hotspot/ip-binding/add', [
    'mac-address' => $macAddress,
    'address' => $address,
    'to-address' => $toAddress,
    'server' => $server,
    'type' => $type,
    'comment' => $comment,
]);

if ($addBinding !== null && !isset($addBinding['!trap'])) {
    $status = true;
    $message = 'IP binding added successfully.';
} else {
    $status = false;
    $message = 'Failed to add IP binding.';
}

echo json_encode(['status' => $status, 'message' => $message], JSON_PRETTY_PRINT);
