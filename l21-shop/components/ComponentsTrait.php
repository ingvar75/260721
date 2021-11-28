<?php

namespace components;

use App;

trait ComponentsTrait
{
    public function config(): Storage
    {
        return App::get()->getConfig();
    }

    public function template(): Template
    {
        return App::get()->getComponents()->get(App::TEMPLATE);
    }

    public function request(): Request
    {
        return App::get()->getComponents()->get(App::REQUEST);
    }

    public function response(): Response
    {
        return App::get()->getComponents()->get(App::RESPONSE);
    }

    public function db(): Database
    {
        return App::get()->getComponents()->get(App::DB);
    }

    public function session(): Session
    {
        return App::get()->getComponents()->get(App::SESSION);
    }

    public function user(): User
    {
        return App::get()->getComponents()->get(App::USER);
    }

    public function liqPay(): LiqPay
    {
        return App::get()->getComponents()->get(App::LIQ_PAY);
    }
}