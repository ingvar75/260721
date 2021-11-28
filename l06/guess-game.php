
<?php

if (isset($_POST['number'])) {
    $number = (int)$_POST['number'];
} else {
    $number = 0;
}

$randomNumber = random_int(1, 10);

$isSuccess = $number === $randomNumber;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guess Game</title>
</head>
<body>
<h1>Guess Game</h1>

<?php if ($isSuccess) : ?>
    <p>You are WINNER!</p>
<?php else : ?>
    <p>You are LOOSER. Our number is <?= $randomNumber ?></p>
<?php endif ?>

<form method="post">
    <label for="number-input">Enter number from 1 to 10</label>
    <input type="number"
           name="number"
           min="1"
           max="10"
           value="<?= $number ?>"
           id="number-input">

    <button type="submit">GUESS</button>
</form>
</body>
</html>