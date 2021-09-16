<?php

$name = $_POST['username'] ?? null;
$comment = $_POST['comment'] ?? null;

if (empty($name) || empty($comment)) {
    exit('Comment and Name are required');
}

require_once __DIR__ . '/lib/comments.php';
require_once __DIR__ . '/lib/response.php';

$time = time();
$comment = censor($comment);
$message = getMessageString($name, $comment, $time);
createMessage($message, $time);

redirect('/l10-chat/index.php');