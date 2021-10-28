<?php

namespace models;

use analytics\GoogleTrait;
use analytics\YandexTrait;

class Product
{
    use GoogleTrait, YandexTrait {
        YandexTrait::sendData insteadof GoogleTrait;
        GoogleTrait::sendData as sendGoogleData;
        YandexTrait::sendData as sendYandexData;
    }

    public function sale(): void
    {
        $this->sendGoogleData('Product');
        $this->sendYandexData('Product');
        echo 'Product is sold<br>';
    }
}