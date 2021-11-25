<?php

/**
 * @var \components\Template $this
 * @var \app\views\dto\cart\ViewDTO $variables
 */

$variables = $this->getVariables();

?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($variables->products as $productId => $productData): ?>
        <tr>
            <th scope="row"><?= $productId ?></th>
            <td><?= $productData['title'] ?></td>
            <td>$<?= $productData['price'] ?></td>
            <td><?= $productData['quantity'] ?></td>
            <td>$<?= $productData['total'] ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="4"></td>
        <td class="fw-bold">
            $<?= array_sum(array_column($variables->products, 'total')) ?>
        </td>
    </tr>

    </tbody>
</table>

<div id="liqpay_checkout"></div>
<script>
    window.LiqPayCheckoutCallback = function() {
        LiqPayCheckout.init({
            data: "<?= $variables->paymentData['data'] ?>",
            signature: "<?= $variables->paymentData['signature'] ?>",
            embedTo: "#liqpay_checkout",
            mode: "embed" // embed || popup,
        }).on("liqpay.callback", function(data){
            console.log(data.status);
            console.log(data);
        }).on("liqpay.ready", function(data){
            // ready
        }).on("liqpay.close", function(data){
            // close
        });
    };
</script>
<script src="//static.liqpay.ua/libjs/checkout.js" async></script>