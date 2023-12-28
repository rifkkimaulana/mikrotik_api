<?php
require('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $userId = $_POST['id'];
    $username = $_POST['username'];
    $group = $_POST['group'];
    $allowedAddress = $_POST['allowed_address'];
    $lastLogin = $_POST['last_login'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        echo json_encode(['status' => false, 'message' => 'Password confirmation does not match.'], JSON_PRETTY_PRINT);
        exit();
    }

    $userToUpdate = [
        '.id' => $userId,
        'name' => $username,
        'group' => $group,
        'allowed-address' => $allowedAddress,
        'last-login' => $lastLogin,
        'password' => $password,
    ];

    $updateUser = $API->comm('/user/set', $userToUpdate);

    if ($updateUser) {
        echo json_encode(['status' => true, 'message' => 'User updated successfully.'], JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update user.'], JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Invalid request method.'], JSON_PRETTY_PRINT);
}
