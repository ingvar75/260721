<?php

namespace app\models;

class Invoice extends entities\InvoiceEntity
{
    public function getInvoice(float $amount): self
    {
        $user = $this->user()->getModel();
        $hash = $this->generateHash();
        $invoice = self::findOne([
            'user_id' => $user?->id,
            'hash' => $hash,
            'status' => self::STATUS_NEW,
        ]);

        if ($invoice === null) {
            $invoice = new self();
            $invoice->user_id = $user?->id;
            $invoice->hash = $hash;
            $invoice->status = self::STATUS_NEW;
        }

        $invoice->amount = $amount;
        $invoice->save();

        return $invoice;
    }

    private function generateHash(): string
    {
        $user = $this->user()->getModel();
        $date = date('Y-m-d');
        return md5("{$user?->id}::{$date}");
    }
}
