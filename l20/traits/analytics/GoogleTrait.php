<?php

namespace analytics;

trait GoogleTrait
{
    public function sendData(string $object): void
    {
        echo "Data about {$object} was send to Google<br>";
    }
}