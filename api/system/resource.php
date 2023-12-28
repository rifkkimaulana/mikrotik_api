<?php
require('../../config/koneksi.php');

$comm = $API->comm('/system/resource/print');
$jsonData = json_encode($comm);

$dataArray = json_decode($jsonData, true);

if (!empty($dataArray)) {

    $transformedData = [
        'status' => true,
        'data' => [
            [
                'uptime' => $dataArray[0]['uptime'],
                'version' => $dataArray[0]['version'],
                'build-time' => $dataArray[0]['build-time'],
                'free-memory' => $dataArray[0]['free-memory'],
                'total-memory' => $dataArray[0]['total-memory'],
                'cpu' => $dataArray[0]['cpu'],
                'cpu-count' => $dataArray[0]['cpu-count'],
                'cpu-frequency' => $dataArray[0]['cpu-frequency'],
                'cpu-load' => $dataArray[0]['cpu-load'],
                'free-hdd-space' => $dataArray[0]['free-hdd-space'],
                'total-hdd-space' => $dataArray[0]['total-hdd-space'],
                'write-sect-since-reboot' => $dataArray[0]['write-sect-since-reboot'],
                'write-sect-total' => $dataArray[0]['write-sect-total'],
                'architecture-name' => $dataArray[0]['architecture-name'],
                'board-name' => $dataArray[0]['board-name'],
                'platform' => $dataArray[0]['platform'],
            ]
        ]
    ];

    echo json_encode($transformedData, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Empty data array.'], JSON_PRETTY_PRINT);
}

$API->disconnect();
