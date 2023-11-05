<?php

namespace App\Services\Payments;

class BalanceFilter
{
    public function balance_min_filter($data,$balance)
    {
        return array_filter($data, function($item) use($balance) {
            return $item['balance']  >= $balance;
        });
    }

    public function balance_max_filter($data,$balance)
    {
        return array_filter($data, function($item) use($balance) {
            return $item['balance']  <= $balance;
        });
    }
}
