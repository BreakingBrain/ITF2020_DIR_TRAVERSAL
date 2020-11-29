<?php
declare(strict_types=1);

require_once 'kernel/utils.php';

if (!isset($_POST['file'])) {
    http_response_code(400);
    exit;
}


$fileName = STORAGE_DIR.$_POST['file'];
$fileName = str_replace('/', '', $fileName);
$fileName = str_replace('..', '', $fileName);

if (!file_exists($fileName)) {
    http_response_code(404);
    exit;
}

echo file_get_contents($fileName);

?>
