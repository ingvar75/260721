<?php

$groupedFiles = getGroupedFiles(__DIR__);

function getGroupedFiles($rout): array
{
    $elements = [];

    $dirs = getDirs($rout);
    foreach ($dirs as $dir) {
        $files = getFiles("{$rout}/{$dir}");
        $elements[$dir] = $files;
    }

    return $elements;
}

function getFiles(string $rout): array
{
    $files = scandir($rout);
    return array_filter(
        $files,
        static fn ($file): bool => !in_array($file, ['.', '..'])
    );
}

function getDirs(string $rout): array
{
    $dirs = scandir($rout);
    return array_filter($dirs, static function ($item) use ($rout): bool {
        $isDir = is_dir("{$rout}/{$item}");
        if (!$isDir) {
            return false;
        }

        preg_match('/^l\d{2}/', $item, $matches);
        return count($matches) === 1;
    });
}

function renderFilesHTML(array $groupedFiles): string
{
    $html = '<ul>';
    foreach ($groupedFiles as $dir => $files) {
        $html .= '<li>';
        $html .= $dir;
        $html .= '<ul>';
        foreach ($files as $file) {
            $html .= "<li><a href=\"/{$dir}/{$file}\">{$file}</a></li>";
        }
        $html .= '</ul>';
        $html .= '</li>';
    }
    $html .= '</ul>';
    return $html;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?= renderFilesHTML($groupedFiles) ?>

<!--<ul>
    <?php foreach ($groupedFiles as $dir => $files): ?>
        <li>
            <?= $dir ?>
            <ul>
                <?php foreach ($files as $file): ?>
                    <li>
                        <a href="/<?= $dir ?>/<?= $file ?>"><?= $file ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach; ?>
    </ul>-->
</body>
</html>