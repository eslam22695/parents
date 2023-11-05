<?php

namespace App\Services\Payments;

class CurrencyFilter
{
    public function currency_filter($data,$currency)
    {
        return array_filter($data, function($item) use($currency) {
            return $item['currency']  == $currency;
        });
    }
}
