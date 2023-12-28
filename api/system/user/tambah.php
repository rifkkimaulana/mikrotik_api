<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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

    $userToAdd = [
        'name' => $username,
        'group' => $group,
        'allowed-address' => $allowedAddress,
        'last-login' => $lastLogin,
        'password' => $password,
    ];

    $addUser = $API->comm('/user/add', $userToAdd);

    if ($addUser) {
        echo json_encode(['status' => true, 'message' => 'User added successfully.'], JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to add user.'], JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Invalid request method.'], JSON_PRETTY_PRINT);
}
