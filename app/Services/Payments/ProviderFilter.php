<?php

namespace App\Services\Payments;

use App\Services\Payments\LoadDataX;
use App\Services\Payments\LoadDataY;

class ProviderFilter
{

    public function provider_filter($provider)
    {
        
        if($provider == "DataProviderX")
        {
            $loadDataX = new LoadDataX;
            return $loadDataX->loadData();

        } elseif ($provider == "DataProviderY")
        {
            $loadDataY = new LoadDataY;
            return $loadDataY->loadData();
            
        } else {
            return null;
        }
    }
}