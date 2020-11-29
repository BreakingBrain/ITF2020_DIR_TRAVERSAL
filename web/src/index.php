<?php
declare(strict_types=1);
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
<body style="background: black; color: green">
<div>
    <div class="success">
        <!-- upload to /uploads dir -->
        <form enctype="multipart/form-data" action="/upload" method="post">
            <input name="file" type="file">
            <button>Upload</button>
        </form>
    </div>
    <div class="success">
        <form action="/download" method="post">
            <input name="file" type="text">
            <button>Download</button>
        </form>
    </div>
</div>
</body>
</html>
