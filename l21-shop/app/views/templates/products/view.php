<?php

use components\Template;
use app\views\dto\products\ViewDTO;

$variables = $this->getVariables();

/**
 * @var Template $this
 * @var ViewDTO $variables
 */

?>
<h1><?= $variables->product->title ?></h1>
<div>
    <h3 class="text-danger">$<?= $variables->product->price ?></h3>
    <button class="btn btn-success">Buy</button>
</div>
<p><?= $variables->product->description ?></p>