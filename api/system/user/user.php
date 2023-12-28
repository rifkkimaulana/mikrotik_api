<?php
require('../../../config/koneksi.php');

$users = $API->comm('/user/print');

if ($users !== null) {
    $response = [
        'status' => true,
        'data' => $users,
    ];

    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch user data.'], JSON_PRETTY_PRINT);
}
