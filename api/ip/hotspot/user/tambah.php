<?php
require('../../../../config/koneksi.php');

$server = $_POST['server'];
$name = $_POST['name'];
$password = $_POST['password'];
$address = $_POST['address'];
$macAddress = $_POST['mac-address'];
$profile = $_POST['profile'];
$routes = $_POST['routes'];
$email = $_POST['email'];

$addUser = $API->comm('/ip/hotspot/user/add', [
    'server' => $server,
    'name' => $name,
    'password' => $password,
    'address' => $address,
    'mac-address' => $macAddress,
    'profile' => $profile,
    'routes' => $routes,
    'email' => $email,
]);

if ($addUser !== null) {
    $status = true;
    $message = 'Hotspot user added successfully.';
} else {
    $status = false;
    $message = 'Failed to add hotspot user.';
}

echo json_encode(['status' => $status, 'message' => $message], JSON_PRETTY_PRINT);
