<?php

namespace App\Services\Payments;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LoadDataY
{
    public function loadData()
    {
        $data = File::json(base_path('storage/DataProviderY.json'));

        return array_map(function($item) {
            return [
                'balance'     => $item['balance'],
                'currency'    => $item['currency'],
                'email'       => $item['email'],
                'statusCode'  => $item['status']/100,
                'created_at'  => $item['created_at'],
                'id'          => $item['id'],
            ];
        }, $data);
    }
}
