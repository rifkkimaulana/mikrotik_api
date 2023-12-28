<?php

require('system/routeros_api.class.php');

$API = new RouterosAPI();

$ip_address = 'id-39.hostddns.us:7549';
$username = 'admin';
$password = '';

if ($API->koneksi($ip_address, $username, $password)) {
    // echo "Koneksi berhasil!";
} else {
    echo "Koneksi Tidak Berhasil!";
}
