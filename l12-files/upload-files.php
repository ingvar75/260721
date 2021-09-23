<?php

$rout = $_POST['rout'] ?? '';
$upload = $_FILES['upload'] ?? [];

if (empty($upload)) {
    exit('Got no uploaded files');
}

require_once __DIR__ . '/lib/directories.php';
require_once __DIR__ . '/lib/response.php';
$path = preparePath($rout);

$file = "{$path}/{$upload['name']}";
move_uploaded_file($upload['tmp_name'], $file);

redirect("index.php?rout={$rout}");