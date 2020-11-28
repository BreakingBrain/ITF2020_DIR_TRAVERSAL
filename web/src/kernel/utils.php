<?php
declare(strict_types=1);

defined('ALLOWED_IMG_MIMETYPES') || define('ALLOWED_IMG_MIMETYPES', [
    'image/jpeg',
    'image/jpg'
]);

defined('STORAGE_DIR') || define('STORAGE_DIR', '/usr/share/nginx/html/src/uploads/');

function mimeType($file) {
    if (function_exists('mime_content_type')) {
        return mime_content_type($file);
    }

    if (function_exists('finfo_file')) {
        $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($fileinfo, $file);
        finfo_close($fileinfo);
        return $mimeType;
    }

    return false;
}