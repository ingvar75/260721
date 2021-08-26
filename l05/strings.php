<?php

$name = 'Dmytro';

echo 'Test $name string<br>';
echo 'Test ', $name, ' string<br>';
echo 'Test ' . $name . ' string<br>';
echo "Test $name string<br>";
echo('Test<br><br>');

print 'Test $name string<br>';
print "Test $name string<br>";
print('Test<br><br>');

$val = print 'Test $name string<br>';
var_dump($val);
print '<br>';
print '<br>';

// HEREDOC
$sql = <<<SQL
    SELECT *
    FROM users
    WHERE name = '$name'
SQL;
echo $sql, '<br>';

$html = <<<HTML
<div class="test"><span>QQQQQ</span></div>
HTML;
var_dump($html);

$t = <<<QWERTY
test message
with many lines
QWERTY;
echo $t;
echo '<br>';

// NOWDOC
$sql2 = <<<'SQL'
    SELECT *
    FROM users
    WHERE name = '$name'
SQL;
echo $sql2, '<br><br>';

$js = <<<JS
document.addEventListener('click', () => { alert(1) });
JS;
echo $js;