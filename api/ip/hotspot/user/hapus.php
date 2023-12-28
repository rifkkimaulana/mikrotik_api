<?php
require('../../../../config/koneksi.php');

$id = $_POST['id'];

$deleteUser = $API->comm('/ip/hotspot/user/remove', [
    '.id' => $id,
]);

if ($deleteUser !== null) {
    $status = true;
    $message = 'Hotspot user deleted successfully.';
} else {
    $status = false;
    $message = 'Failed to delete hotspot user.';
}

echo json_encode(['status' => $status, 'message' => $message], JSON_PRETTY_PRINT);
