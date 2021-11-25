<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Invoice;
use app\views\dto\cart\ViewDTO;
use components\AbstractController;

class CartController extends AbstractController
{
    public function actionView()
    {
        $cart = new Cart();
        $products = $cart->getProducts();
        $total = array_sum(array_column($products, 'total'));

        $invoice = (new Invoice())->getInvoice($total);

        return $this->render('cart/view', new ViewDTO([
            'products' => $products,
            'paymentData' => $this->liqPay()->getCheckoutData([
                'order_id' => $invoice->id,
                'amount' => $total,
                'description' => "Payment for order #{$invoice->id}",
            ])
        ]));
    }
}