<?php

$date = $_GET['date'] ?? null;
$file = $_GET['file'] ?? null;

if (empty($date) || empty($file)) {
    exit('Got no file for edit');
}

require_once __DIR__ . '/lib/comments.php';

$comment = getComment($date, $file);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form class="mt-3"
          method="post"
          action="/l10-chat/save-message.php">
        <input type="hidden" name="date" value="<?= $date ?>">
        <input type="hidden" name="file" value="<?= $file ?>">

        <div class="form-block mb-3">
            <label for="chat-username" class="form-label">Your Name</label>
            <input type="text"
                   name="username"
                   id="chat-username"
                   value="<?= $comment['name'] ?>"
                   class="form-control">
        </div>

        <div class="form-block mb-3">
            <label for="chat-comment" class="form-label">Comment</label>
            <textarea
                name="comment"
                id="chat-comment"
                class="form-control"
            ><?= $comment['comment'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>

</div>
</body>
</html>