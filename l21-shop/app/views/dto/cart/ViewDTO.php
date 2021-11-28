<?php

namespace app\views\dto\cart;

use app\views\dto\AbstractViewDTO;

class ViewDTO extends AbstractViewDTO
{
    public array $products;
    public array $paymentData;
}