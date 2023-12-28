<?php
require('../../config/koneksi.php');

$fileName = isset($_GET['name']) ? $_GET['name'] : '';

if (empty($fileName)) {
    echo json_encode(['status' => false, 'message' => 'File name is missing.'], JSON_PRETTY_PRINT);
    exit();
}

$removeResponse = $API->comm('/file/remove', [
    '.id' => $fileName,
]);

if ($removeResponse !== null) {
    echo json_encode(['status' => true, 'message' => 'File successfully removed.'], JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to remove file.'], JSON_PRETTY_PRINT);
}
