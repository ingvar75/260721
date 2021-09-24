<?php

$rout = $_POST['rout'] ?? '';
$upload = $_FILES['upload'] ?? [];

if (empty($upload['name'][0])) {
    exit('Got no uploaded files');
}

require_once __DIR__ . '/lib/directories.php';
require_once __DIR__ . '/lib/response.php';
require_once __DIR__ . '/lib/files.php';
$path = preparePath($rout);

uploadFiles($upload, $path);

redirect("index.php?rout={$rout}");