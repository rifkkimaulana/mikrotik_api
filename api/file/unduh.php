<?php
require('../../config/koneksi.php');

// Mendapatkan nilai parameter 'name' dari query string
$fileName = isset($_GET['name']) ? $_GET['name'] : '';

if (empty($fileName)) {
    // Jika parameter 'name' tidak diberikan, berikan respon kesalahan
    echo json_encode(['status' => false, 'message' => 'File name is missing.'], JSON_PRETTY_PRINT);
    exit();
}

// Kirim permintaan untuk mendapatkan file berdasarkan nama
$fileContent = $API->comm('/file/get', [
    '.id' => $fileName,
]);

// Cek apakah permintaan berhasil
if ($fileContent !== null) {
    // Mengirim file ke browser untuk diunduh
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
    echo $fileContent;

    // Hentikan eksekusi skrip setelah mengirimkan file
    exit();
} else {
    // Jika permintaan gagal, tampilkan pesan kesalahan
    echo json_encode(['status' => false, 'message' => 'Failed to download file.'], JSON_PRETTY_PRINT);
}
