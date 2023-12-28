<?php
require('../../../../config/koneksi.php');

$targetComment = isset($_GET['komentar']) ? $_GET['komentar'] : '';

if (empty($targetComment)) {
    echo json_encode(['status' => false, 'message' => 'Comment is missing.'], JSON_PRETTY_PRINT);
    exit();
}

$hotspotUserData = $API->comm('/ip/hotspot/user/print');

$filteredData = array_filter($hotspotUserData, function ($user) use ($targetComment) {
    return isset($user['comment']) && $user['comment'] === $targetComment;
});

$indexedData = array_values($filteredData);

if (!empty($indexedData)) {
    $transformedData = [
        'status' => true,
        'data' => $indexedData,
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'No matching data found.'], JSON_PRETTY_PRINT);
}
