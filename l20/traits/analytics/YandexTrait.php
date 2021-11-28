<?php

namespace analytics;

trait YandexTrait
{
    public function sendData(string $object): void
    {
        echo "Data about {$object} was send to Yandex<br>";
    }
}