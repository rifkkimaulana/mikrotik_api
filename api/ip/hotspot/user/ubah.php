<?php
require('../../../../config/koneksi.php');

$id = $_POST['id'];
$server = $_POST['server'];
$name = $_POST['name'];
$password = $_POST['password'];
$address = $_POST['address'];
$macAddress = $_POST['mac-address'];
$profile = $_POST['profile'];
$routes = $_POST['routes'];
$email = $_POST['email'];

$editUser = $API->comm('/ip/hotspot/user/set', [
    '.id' => $id,
    'server' => $server,
    'name' => $name,
    'password' => $password,
    'address' => $address,
    'mac-address' => $macAddress,
    'profile' => $profile,
    'routes' => $routes,
    'email' => $email,
]);

if ($editUser !== null) {
    $status = true;
    $message = 'Hotspot user edited successfully.';
} else {
    $status = false;
    $message = 'Failed to edit hotspot user.';
}

echo json_encode(['status' => $status, 'message' => $message], JSON_PRETTY_PRINT);
