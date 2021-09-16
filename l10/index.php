?php

require_once __DIR__ . '/lib/comments.php';

$dates = getDates();
$currentDate = $_GET['date'] ?? current($dates);

$comments = getComments($currentDate);

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
    <form class="mt-3" method="post" action="send-message.php">
        <div class="form-block mb-3">
            <label for="chat-username" class="form-label">Your Name</label>
            <input type="text"
                   name="username"
                   id="chat-username"
                   value=""
                   class="form-control">
        </div>

        <div class="form-block mb-3">
            <label for="chat-comment" class="form-label">Comment</label>
            <textarea
                name="comment"
                id="chat-comment"
                class="form-control"
            ></textarea>
        </div>

        <button type="submit" class="btn btn-success">Send</button>
    </form>

    <ul class="nav nav-tabs mt-3">
        <?php foreach ($dates as $date): ?>
            <li class="nav-item">
                <a class="nav-link <?= $currentDate === $date ? 'active' : '' ?>"
                   href="/l10-chat/index.php?date=<?= $date ?>">
                    <?= $date ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Info</th>
            <th scope="col">Comment</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($comments as $comment): ?>
            <tr>
                <td>
                    Author: <b><?= $comment['name'] ?></b><br>
                    Created: <?= date('M d, Y, H:i', $comment['created_at']) ?><br>
                    <?php if (!empty($comment['updated_at'])): ?>
                        Edited: <?= date('M d, Y, H:i', $comment['updated_at']) ?><br>
                    <?php endif; ?>
                    <a class="btn btn-sm btn-info"
                       href="/l10-chat/edit.php?date=<?= $currentDate ?>&file=<?= $comment['file'] ?>">Edit</a>
                    <a class="btn btn-sm btn-danger"
                       href="/l10-chat/delete.php?date=<?= $currentDate ?>&file=<?= $comment['file'] ?>">Delete</a>
                </td>
                <td><?= nl2br($comment['comment']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>