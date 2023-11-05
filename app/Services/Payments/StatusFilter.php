<?php

namespace App\Services\Payments;

class StatusFilter
{
    public function status_filter($data,$status)
    {
        if ($status == "authorised") {
            return array_filter($data, function($item) {
                return $item['statusCode'] == 1;
            });
        } elseif ($status == "decline") {
            return array_filter($data, function($item) {
                return $item['statusCode'] == 2;
            });
        } elseif ($status == "refunded") {
            return array_filter($data, function($item) {
                return $item['statusCode'] == 3;
            });
        }
    }
}
