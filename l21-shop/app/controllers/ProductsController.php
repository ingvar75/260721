<?php

namespace app\controllers;

use app\models\Cart;
use app\models\entities\ProductEntity;
use app\views\dto\products\ListDTO;
use app\views\dto\products\ViewDTO;
use components\AbstractController;
use exceptions\NotFoundException;

class ProductsController extends AbstractController
{
    public function actionView(int $id): string
    {
        return $this->render(
            'products/view',
            new ViewDTO(['product' => $this->findProduct($id)])
        );
    }

    public function actionList(): string
    {
        $products = ProductEntity::findAll();

        return $this->render(
            'products/list',
            new ListDTO(['products' => $products])
        );
    }

    public function actionAdd(): string
    {
        if ($this->request()->isPost()) {
            $product = new ProductEntity();
            $product->load($this->request()->post()->all());
            $product->save();

            $this->response()->redirect("/products/view/id/{$product->id}");
        }
        return $this->render('products/add');
    }

    public function actionAddToCart()
    {
        if (!$this->request()->isAjax() || !$this->request()->isPost()) {
            throw new NotFoundException('Request should be AJAX and POST');
        }

        $product = $this->findProduct($this->request()->post()->get('productId'));
        $cart = new Cart();
        $cart->addProduct($product);

        return ['productsInCart' => $cart->getProductsCount()];
    }

    private function findProduct(int $id): ProductEntity
    {
        $product = ProductEntity::findOne(['id' => $id]);
        if (!$product) {
            throw new NotFoundException("Product #{$id} is undefined");
        }

        return $product;
    }
}