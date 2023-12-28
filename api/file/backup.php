<?php
require('../../config/koneksi.php');


$backupResponse = $API->comm('/system/backup/save');

if ($backupResponse !== null) {
    echo json_encode(['status' => true, 'message' => 'Backup file created successfully.'], JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to create backup file.'], JSON_PRETTY_PRINT);
}
