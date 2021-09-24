<?php

require_once __DIR__ . '/lib/directories.php';
require_once __DIR__ . '/lib/files.php';

$rout = $_GET['rout'] ?? '';
$path = preparePath($rout);

if (!file_exists($path)) {
    exit('File not exists');
}

$fileName = basename($path);
$mimeType = mime_content_type($path);
$fileSize = filesize($path);

header("Content-Type: {$mimeType}");
header("Content-disposition: attachment; filename=\"{$fileName}\"");
header("Content-Length: {$fileSize}");

readFileContent($path);
