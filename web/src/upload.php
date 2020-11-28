<?php
declare(strict_types=1);

require_once 'kernel/utils.php';

function upload() {
    $mimeType = mimeType($_FILES['file']['tmp_name']);
    if (!in_array($mimeType, ALLOWED_IMG_MIMETYPES)) {
        throw new \Exception(sprintf('File mime type is not supported. Allowed types: %s', implode(', ', ALLOWED_IMG_MIMETYPES)));
    }

    $fileName = md5(random_bytes(16));

    rename($_FILES['file']['tmp_name'], STORAGE_DIR.$fileName);
    return $fileName;
}

$status = 'success';
try {
    $uploaded = upload();
    $message = 'File uploaded successfully: '.$uploaded;
} catch (\Throwable $e) {
    $message = 'Unsupported file';
    $status = 'warn';
}

?>
<html>
<head>
    <title>Image storage</title>
    <style>

        .warn {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
            border: 3px solid darkred;
            color: darkred;
            font-size: 500%;
            animation: blink 2s infinite;
        }

        .success {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
            border: 3px solid green;
            color: green;
            font-size: 500%;
        }

        @keyframes blink {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }
    </style>
</head>
<body style="background: black">
<div>
    <h2 class="<?= $status ?>"><?= $message ?></h2>
    <a href="/">Go to main page</a>
</div>
<!-- follow the robots -->
</body>
</html>