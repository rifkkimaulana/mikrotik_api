<?php
set_time_limit(500);
require('../../../../config/koneksi.php');

$targetComment = isset($_GET['komentar']) ? $_GET['komentar'] : '';

if (empty($targetComment)) {
    echo json_encode(['status' => false, 'message' => 'Comment is missing.'], JSON_PRETTY_PRINT);
    exit();
}

$hotspotUserData = $API->comm('/ip/hotspot/user/print');

$deletedCount = 0;
foreach ($hotspotUserData as $user) {
    if (isset($user['comment']) && $user['comment'] === $targetComment) {
        $deleteResult = $API->comm('/ip/hotspot/user/remove', [
            '.id' => $user['.id'],
        ]);

        if ($deleteResult !== null) {
            $deletedCount++;
        }
    }
}

if ($deletedCount > 0) {
    echo json_encode(['status' => true, 'message' => "$deletedCount Hotspot users deleted successfully."], JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'No matching users found.'], JSON_PRETTY_PRINT);
}
