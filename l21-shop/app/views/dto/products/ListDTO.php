<?php

namespace app\views\dto\products;

use app\models\entities\ProductEntity;
use app\views\dto\AbstractViewDTO;
use Generator;

class ListDTO extends AbstractViewDTO
{
    /**
     * @var Generator|ProductEntity[]
     */
    public Generator $products;
}