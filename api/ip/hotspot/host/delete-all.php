<?php
require('../../../../config/koneksi.php');

$API->comm('/ip/hotspot/host/remove');

$response = $API->read();

if ($response && isset($response['!trap'])) {
    echo json_encode(['status' => false, 'message' => $response['!trap'][0]['message']], JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => true, 'message' => 'All Hotspot hosts deleted successfully.'], JSON_PRETTY_PRINT);
}
