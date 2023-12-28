<?php
require('../../../config/koneksi.php');

$scriptId = isset($_GET['id']) ? $_GET['id'] : '';
$scriptName = isset($_GET['name']) ? $_GET['name'] : '';
$scriptSource = isset($_GET['source']) ? $_GET['source'] : '';

if (empty($scriptId) || empty($scriptName) || empty($scriptSource)) {
    echo json_encode(['status' => false, 'message' => 'ID, script name, and source are required.'], JSON_PRETTY_PRINT);
    exit();
}

$updateScriptName = $API->comm('/system/script/set', [
    '.id' => $scriptId,
    'name' => $scriptName,
]);

if ($updateScriptName !== null) {
    $updateScriptSource = $API->comm('/system/script/set', [
        '.id' => $scriptId,
        'source' => $scriptSource,
    ]);

    if ($updateScriptSource !== null) {
        $response = [
            'status' => true,
            'message' => 'Script updated successfully.',
        ];

        echo json_encode($response, JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update script source.'], JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to update script name.'], JSON_PRETTY_PRINT);
}
