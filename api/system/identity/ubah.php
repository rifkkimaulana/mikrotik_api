<?php
require('../../../config/koneksi.php');

$newIdentity = isset($_POST['name']) ? $_POST['name'] : '';

if (empty($newIdentity)) {
    echo json_encode(['status' => false, 'message' => 'New identity is missing.'], JSON_PRETTY_PRINT);
    exit();
}

$response = $API->comm('/system/identity/set', [
    'name' => $newIdentity,
]);

if ($response !== null && empty($response['!trap'])) {
    echo json_encode(['status' => true, 'message' => 'Identity updated successfully.'], JSON_PRETTY_PRINT);
} else {
    $errorMessage = !empty($response['!trap']) ? $response['!trap'][0]['message'] : 'Unknown error.';
    echo json_encode(['status' => false, 'message' => 'Failed to update identity. Error: ' . $errorMessage], JSON_PRETTY_PRINT);
}
