<?php

namespace App\Services\Payments;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LoadDataX
{
    public function loadData()
    {
        $data = File::json(base_path('storage/DataProviderX.json'));

        return array_map(function($item) {
            return [
                'balance'     => $item['parentAmount'],
                'currency'    => $item['Currency'],
                'email'       => $item['parentEmail'],
                'statusCode'  => $item['statusCode'],
                'created_at'  => $item['registerationDate'],
                'id'          => $item['parentIdentification'],
            ];
        }, $data);
    }
}
