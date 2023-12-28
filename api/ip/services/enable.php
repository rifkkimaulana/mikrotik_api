<?php
require('../../../config/koneksi.php');

$serviceId = isset($_POST['id']) ? $_POST['id'] : '';

if (empty($serviceId)) {
    echo json_encode(['status' => false, 'message' => 'ID service is missing.'], JSON_PRETTY_PRINT);
    exit();
}

$disableResult = $API->comm('/ip/service/enable', [
    '.id' => $serviceId,
]);

if ($disableResult !== null) {
    echo json_encode(['status' => true, 'message' => 'Service has been disabled successfully.'], JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to disable service.'], JSON_PRETTY_PRINT);
}
