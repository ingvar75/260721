<?php

const STORAGE_DIR = __DIR__ . '/../storage/';

function createDirectory(string $name, string $rout): void
{
    $rout = preparePath($rout);
    $newRout = "{$rout}/{$name}";

    !is_dir($newRout) && mkdir($newRout);
    if (!is_dir($newRout)) {
        exit("Directory {$newRout} can not be created");
    }
}

function readDirectory(string $rout): array
{
    $path = preparePath($rout);

    $filterItems = ['.', '.gitignore'];
    if ($path === realpath(STORAGE_DIR)) {
        $filterItems[] = '..';
    }

    $dir = opendir($path);
    $items = [];
    while (($item = readdir($dir)) !== false) {
        if (in_array($item, $filterItems, true)) {
            continue;
        }

        $itemPath = "{$path}/{$item}";
        $items[] = [
            'name' => $item,
            'rout' => "{$rout}/{$item}",
            'path' => $itemPath,
            'is_dir' => is_dir($itemPath),
        ];
    }
    closedir($dir);

//    usort($items, static fn (array $a, array $b) => $a['name'] <=> $b['name']);
    usort($items, 'sortFileType');

    return $items;
}

function preparePath(string $rout): string
{
    $path = realpath(STORAGE_DIR . $rout);
    if (!is_file($path) && !is_dir($path)) {
        exit("{$rout} is not exists");
    }

    return $path;
}

function prepareRout(string $rout): string
{
    $path = preparePath($rout);
    $storage = realpath(STORAGE_DIR);
    if (!str_starts_with($path, $storage)) {
        return '';
    }

    return str_replace($storage, '', $path);
}

function sortFileType(array $a, array $b): int
{
    $fileA = $a['path'];
    $fileB = $b['path'];

    if (is_dir($fileA)) {
        return is_dir($fileB) ? strnatcasecmp($fileA, $fileB) : -1;
    }

    if (is_dir($fileB)) {
        return 1;
    }

    $aExt = pathinfo($fileA, PATHINFO_EXTENSION);
    $bExt = pathinfo($fileB, PATHINFO_EXTENSION);

    if ($aExt === $bExt) {
        return strnatcasecmp($fileA, $fileB);
    }

    return strcasecmp($aExt, $bExt);
}