<?php

require_once __DIR__ . '/directories.php';

const ALLOWED_FILES = [
    'image/gif',
    'image/jpeg',
    'image/png',
    'text/plain',
    'video/mp4',
    'video/mpeg',
    'application/msword',
    'application/vnd.ms-excel',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'application/vnd.rar',
    'application/zip',
    'application/pdf',
];

function reArrayUploads(array $files): array
{
    $filesCount = count($files['name']);
    $keys = array_keys($files);
    $result = [];
    for ($i = 0; $i < $filesCount; $i++) {
        foreach ($keys as $key) {
            $result[$i][$key] = $files[$key][$i];
        }
    }

    return $result;
}

function uploadFiles(array $upload, string $targetDir)
{
    $files = reArrayUploads($upload);
    foreach ($files as $file) {
        $targetFile = "{$targetDir}/{$file['name']}";

        $mimeType = mime_content_type($file['tmp_name']);
        if (!in_array($mimeType, ALLOWED_FILES, true)) {
            continue;
        }

        move_uploaded_file($file['tmp_name'], $targetFile);
    }
}

function renderFile(string $rout): string
{
    $file = preparePath($rout);
    $mimeType = mime_content_type($file);

    switch ($mimeType) {
        case 'image/gif':
        case 'image/jpeg':
        case 'image/png':
            $content = renderImage($rout);
            break;
        case 'text/plain':
            $content = renderText($file);
            break;
        default:
            $content = "<p>File with type '{$mimeType}' can not be rendered</p>";
    }

    return $content . getDownloadLink($rout);
}

function renderImage(string $rout): string
{
    return "<img src='/l12-files/file-render.php?rout={$rout}' alt='' width='100%'>";
}

function renderText($path): string
{
    return '<pre>' . file_get_contents($path) . '</pre>';
}

function getDownloadLink(string $rout): string
{
    return "<a href='/l12-files/file-download.php?rout={$rout}' class='btn btn-primary mt-3'>Download</a>";
}

function readFileContent(string $path): void
{
    $file = fopen($path, 'rb');
    while($content = fread($file, 1024)) {
        echo $content;
    }
    fclose($file);

    exit;
}