<?php
require('../../config/koneksi.php');

$comm = $API->comm('/interface/print');

// var_dump($comm);
$jsonData = json_encode($comm);

$dataArray = json_decode($jsonData, true);

if ($dataArray !== null) {
    if (!empty($dataArray)) {
        $transformedData = [
            'status' => true,
            'data' => []
        ];

        foreach ($dataArray as $interfaceData) {
            $transformedData['data'][] =
                [
                    'id' => $dataArray[0]['.id'],
                    'name' => $dataArray[0]['name'],
                    'default_name' => $dataArray[0]['default-name'],
                    'type' => $dataArray[0]['type'],
                    'mtu' => $dataArray[0]['mtu'],
                    'actual_mtu' => $dataArray[0]['actual-mtu'],
                    'mac_address' => $dataArray[0]['mac-address'],
                    'last_link_up_time' => $dataArray[0]['last-link-up-time'],
                    'link_down' => $dataArray[0]['link-downs'],
                    'running' => $dataArray[0]['running'],
                    'disabled' => $dataArray[0]['disabled']
                ];
        }

        echo json_encode($transformedData, JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['status' => false, 'message' => 'Empty data array.'], JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to decode JSON data.'], JSON_PRETTY_PRINT);
}
