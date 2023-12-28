<?php
require('../../../config/koneksi.php');

$scriptName = isset($_GET['name']) ? $_GET['name'] : '';
$scriptSource = isset($_GET['source']) ? $_GET['source'] : '';

if (empty($scriptName) || empty($scriptSource)) {
    echo json_encode(['status' => false, 'message' => 'Script name and source are required.'], JSON_PRETTY_PRINT);
    exit();
}

$addScript = $API->comm('/system/script/add', [
    'name' => $scriptName,
    'source' => $scriptSource,
]);

if ($addScript !== null) {
    $response = [
        'status' => true,
        'message' => 'Script added successfully.',
    ];

    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to add script.'], JSON_PRETTY_PRINT);
}
