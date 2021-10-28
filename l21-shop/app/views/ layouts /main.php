<?php

/**
 * @var \components\Template $this
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-3">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products/list">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cabinet/index">Cabinet</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?= $this->getContent() ?>
</div>
<script src="/public/js/bootstrap.bundle.js"></script>
</body>
</html>