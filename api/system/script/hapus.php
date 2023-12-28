<?php
require('../../../config/koneksi.php');

$scriptName = isset($_GET['name']) ? $_GET['name'] : '';

if (empty($scriptName)) {
    echo json_encode(['status' => false, 'message' => 'Script name is required.'], JSON_PRETTY_PRINT);
    exit();
}

$getScript = $API->comm('/system/script/print', [
    '?name' => $scriptName,
]);

if (!empty($getScript)) {
    $scriptId = $getScript[0]['.id'];

    $removeScript = $API->comm('/system/script/remove', [
        '.id' => $scriptId,
    ]);

    if ($removeScript !== null) {
        $response = [
            'status' => true,
            'message' => 'Script removed successfully.',
        ];

        echo json_encode($response, JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to remove script.'], JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Script not found.'], JSON_PRETTY_PRINT);
}
