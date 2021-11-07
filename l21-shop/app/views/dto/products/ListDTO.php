<?php

namespace app\views\dto\products;

use app\models\entities\ProductEntity;
use app\views\dto\AbstractViewDTO;

class ListDTO extends AbstractViewDTO
{
    /**
     * @var ProductEntity[]
     */
    public array $products;
}