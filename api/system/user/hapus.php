<?php
require('../../../config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $userId = $_POST['id'];

    $userToDelete = ['.id' => $userId];

    $deleteUser = $API->comm('/user/remove', $userToDelete);

    if ($deleteUser) {
        echo json_encode(['status' => true, 'message' => 'User deleted successfully.'], JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to delete user.'], JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Invalid request method.'], JSON_PRETTY_PRINT);
}
