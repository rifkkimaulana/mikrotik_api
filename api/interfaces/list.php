<?php
require('../../config/koneksi.php');

$comm = $API->comm('/interface/list/print');

//var_dump($comm);

$jsonData = json_encode($comm);

$dataArray = json_decode($jsonData, true);

if ($dataArray !== null) {
    if (!empty($dataArray)) {
        $transformedData = [
            'status' => true,
            'data' => []
        ];

        foreach ($dataArray as $interfaceData) {
            $transformedData['data'][] = [
                'id' => $interfaceData['.id'],
                'name' => $interfaceData['name'],
                'dynamic' => $interfaceData['dynamic'],
                'include' => $interfaceData['include'],
                'exclude' => $interfaceData['exclude'],
                'builtin' => $interfaceData['builtin'],
                'comment' => $interfaceData['comment']
            ];
        }

        echo json_encode($transformedData, JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['status' => false, 'message' => 'Empty data array.'], JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to decode JSON data.'], JSON_PRETTY_PRINT);
}
