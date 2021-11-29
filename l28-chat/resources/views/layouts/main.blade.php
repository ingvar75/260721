<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <link href="/css/bootstrap.4.6.1.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-3" id="main-container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

</div>
<script src="/js/bootstrap.4.6.1.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/f1af6bb8d5.js" crossorigin="anonymous"></script>
</body>
</html>
