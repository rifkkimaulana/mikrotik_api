<?php
set_time_limit(500);
require('../../../../config/koneksi.php');

function generateUniqueCode($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';

    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $code;
}

$komentar = generateUniqueCode(10);
$jumlahUser = $_POST['jumlah'];

$generatedData = [];

// Membuat nama pengguna, kata sandi, dan komentar unik untuk setiap voucher
for ($i = 1; $i <= $jumlahUser; $i++) {
    $username = generateUniqueCode(6);
    $password = generateUniqueCode(6);

    // Membuat pengguna hotspot dengan nama pengguna, kata sandi, dan komentar unik
    $addUser = $API->comm('/ip/hotspot/user/add', [
        // 'server' => 'default',
        'name' => $username,
        'password' => $password,
        'comment' => $komentar,
    ]);

    if ($addUser === null) {
        $status = false;
        $message = 'Failed to add hotspot user.';
        break;
    } else {
        $status = true;
        $message = 'Hotspot users added successfully.';
        $generatedData[] = [
            'username' => $username,
            'password' => $password,
            'comment' => $komentar,
        ];
    }
}

echo json_encode(['status' => $status, 'message' => $message, 'data' => $generatedData], JSON_PRETTY_PRINT);
