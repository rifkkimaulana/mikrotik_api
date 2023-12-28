<?php
require('../../config/koneksi.php');

$queueInfo = $API->comm('/queue/simple/print');

if ($queueInfo !== null) {
    echo json_encode(['status' => true, 'data' => $queueInfo], JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch queue information.'], JSON_PRETTY_PRINT);
}
