<?php
require('../../../../config/koneksi.php');

$ipHotspotActive = $API->comm('/ip/hotspot/active/print');

if ($ipHotspotActive !== null && !empty($ipHotspotActive)) {
    $API->comm('/ip/hotspot/active/remove', ['numbers' => implode(',', array_column($ipHotspotActive, '.id'))]);

    echo json_encode(['status' => true, 'message' => 'All Hotspot Active connections deleted.'], JSON_PRETTY_PRINT);
} else {
    echo json_encode(['status' => false, 'message' => 'No Hotspot Active connections found.'], JSON_PRETTY_PRINT);
}
