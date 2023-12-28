<?php
require('../../../../config/koneksi.php');

if (isset($_POST['selected_ids']) && is_array($_POST['selected_ids'])) {
    $selectedIds = $_POST['selected_ids'];

    foreach ($selectedIds as $id) {
        $API->comm('/ip/hotspot/active/remove', ['.id' => $id]);
    }

    echo json_encode(['status' => true, 'message' => 'Selected IP Hotspot Active removed successfully.'], JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'Selected IDs not found or not in array format.'], JSON_PRETTY_PRINT);
}
