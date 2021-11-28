<?php

require_once __DIR__ . '/lib/files.php';
require_once __DIR__ . '/lib/directories.php';

$rout = $_GET['rout'] ?? '';
$path = preparePath($rout);

if (!file_exists($path)) {
    exit('File not exists');
}

$mimeType = mime_content_type($path);
header("Content-Type: {$mimeType}");

readFileContent($path);