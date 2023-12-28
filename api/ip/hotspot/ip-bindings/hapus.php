<?php
require('../../../../config/koneksi.php');

$id = $_POST['id'];

$deleteBinding = $API->comm('/ip/hotspot/ip-binding/remove', [
    '.id' => $id,
]);

if ($deleteBinding !== null && !isset($deleteBinding['!trap'])) {
    $status = true;
    $message = 'IP binding deleted successfully.';
} else {
    $status = false;
    $message = 'Failed to delete IP binding.';
}

echo json_encode(['status' => $status, 'message' => $message], JSON_PRETTY_PRINT);
