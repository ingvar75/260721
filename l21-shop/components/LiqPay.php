<?php

namespace components;

class LiqPay
{
    public const ACTION_PAY = 'pay';
    public const ACTION_HOLD = 'hold';
    public const ACTION_SUBSCRIBE = 'subscribe';
    public const ACTION_DONATE = 'paydonate';
    public const ACTION_AUTH = 'auth';

    private \vendor\LiqPay $cdn;
    private string $currency;

    public function __construct(
        string $publicKey,
        string $privateKey,
        string $currency,
        ?string $apiUrl = null
    ) {
        $this->cdn = new \vendor\LiqPay($publicKey, $privateKey, $apiUrl);
        $this->currency = $currency;
    }

    public function getCheckoutData(array $data): array
    {
        $data = array_merge([
            'version' => 3,
            'action' => self::ACTION_PAY,
            'currency' => $this->currency,
        ], $data);
        return $this->cdn->cnb_form_raw($data);
    }
}