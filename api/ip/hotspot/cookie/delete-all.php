<?php
require('../../../../config/koneksi.php');

$API->comm('/ip/hotspot/cookie/remove', array('.id' => '*'));

$response = $API->comm('/ip/hotspot/cookie/print');
if ($response !== null) {
    $status = true;
    $message = 'All hotspot cookies have been removed.';
} else {
    $status = false;
    $message = 'Failed to remove hotspot cookies.';
}

echo json_encode(['status' => $status, 'message' => $message], JSON_PRETTY_PRINT);
