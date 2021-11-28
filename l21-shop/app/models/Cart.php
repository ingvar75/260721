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

    public function getProducts(): array
    {
        /** @var ProductEntity[] $products */
        $products = $this->session()->get(self::CART_KEY, []);
        $result = [];
        foreach ($products as $product) {
            if (!array_key_exists($product->id, $result)) {
                $result[$product->id] = [
                    'title' => $product->title,
                    'price' => $product->price,
                    'quantity' => 1,
                    'total' => $product->price,
                ];
            } else {
                $result[$product->id]['quantity']++;
                $result[$product->id]['total'] += $product->price;
            }
        }

        return $result;
    }
}