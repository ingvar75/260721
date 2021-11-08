<?php

namespace app\models;

use app\models\entities\ProductEntity;
use components\ComponentsTrait;

class Cart
{
    use ComponentsTrait;

    private const CART_KEY = 'productsCart';

    public function addProduct(ProductEntity $product): void
    {
        $this->session()->add(self::CART_KEY, $product);
    }

    public function getProductsCount(): int
    {
        return count($this->session()->get(self::CART_KEY, []));
    }
}