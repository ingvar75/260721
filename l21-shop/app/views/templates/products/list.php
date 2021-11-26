<?php

use app\views\dto\products\ListDTO;
use components\Template;

/**
 * @var Template $this
 * @var ListDTO $variables
 */

$variables = $this->variables;

?>

<a href="/products/add" class="btn btn-success mt-3">Add product</a>

<h1>List</h1>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Description</th>
        <th scope="col">Created At</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($variables->products as $product): ?>
        <tr>
            <th scope="row"><?= $product->id ?></th>
            <td><?= $product->title ?></td>
            <td>
                $<?= $product->price ?>
                <button class="btn
                           btn-success
                           buy-button
                           <?= $product->quantity < 1 ? 'disabled' : '' ?>"
                        data-product-id="<?= $product->id ?>"
                >
                    Buy
                </button>
            </td>
            <td><?= $product->quantity ?></td>
            <td><?= $product->description ?></td>
            <td><?= (new DateTime($product->created_at))->format('d M Y H:i') ?></td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>