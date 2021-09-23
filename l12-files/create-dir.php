<?php

$dirName = $_POST['dirName'] ?? null;
$rout = $_POST['rout'] ?? '';

if (empty($dirName)) {
    exit('Directory name is required');
}

require_once __DIR__ . '/lib/directories.php';
require_once __DIR__ . '/lib/response.php';

createDirectory($dirName, $rout);
redirect("/l12-files/index.php?rout={$rout}");