<?php
require('../../../../config/koneksi.php');

$postedIds = isset($_POST['ids']) ? $_POST['ids'] : [];

if (empty($postedIds)) {
    echo json_encode(['status' => false, 'message' => 'No IDs provided for deletion.'], JSON_PRETTY_PRINT);
    exit();
}

$deletedIds = [];
foreach ($postedIds as $id) {
    $result = $API->comm('/ip/hotspot/cookie/remove', ['.id' => $id]);
    if ($result) {
        $deletedIds[] = $id;
    }
}

if (!empty($deletedIds)) {
    $response = [
        'status' => true,
        'message' => 'Successfully deleted IDs: ' . implode(', ', $deletedIds),
    ];
} else {
    $response = [
        'status' => false,
        'message' => 'Failed to delete IDs. Check if the provided IDs are valid.',
    ];
}

echo json_encode($response, JSON_PRETTY_PRINT);
