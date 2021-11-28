<?php

namespace models;

use analytics\GoogleTrait;
use analytics\YandexTrait;

class Discount
{
    use GoogleTrait;
    use YandexTrait {
        GoogleTrait::sendData insteadof YandexTrait;
        GoogleTrait::sendData as sendGoogleData;
        YandexTrait::sendData as sendYandexData;
    }

    public function useDiscount(): void
    {
        $this->sendGoogleData('Discount');
        $this->sendYandexData('Discount');
        echo 'Discount is used<br>';
    }
}