<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Payments\LoadDataX;
use App\Services\Payments\LoadDataY;
use App\Services\Payments\ProviderFilter;
use App\Services\Payments\StatusFilter;
use App\Services\Payments\BalanceFilter;
use App\Services\Payments\CurrencyFilter;

class UserController extends Controller
{
    private $loadDataX;
    private $loadDataY;
    private $providerFilter;
    private $statusFilter;
    private $balanceFilter;
    private $currencyFilter;

    public function __construct(LoadDataX $loadDataX, LoadDataY $loadDataY, ProviderFilter $providerFilter, StatusFilter $statusFilter, BalanceFilter $balanceFilter, CurrencyFilter $currencyFilter)
    {
        $this->loadDataX = $loadDataX;
        $this->loadDataY = $loadDataY;
        $this->providerFilter = $providerFilter;
        $this->statusFilter = $statusFilter;
        $this->balanceFilter = $balanceFilter;
        $this->currencyFilter = $currencyFilter;
    }

    public function index(Request $request)
    {        
        if($request->has('provider') && $request->provider != null)
        {
            if($this->providerFilter->provider_filter($request->provider) != null)
            {
                $data = $this->providerFilter->provider_filter($request->provider);
            } else {
                return response()->json(['error' => 'Invalid Provider'], 401);
            }

        } else {
            $data = array_merge($this->loadDataX->loadData(),$this->loadDataY->loadData());
        }

        if($request->has('statusCode') && $request->statusCode != null)
        {
            $data = $this->statusFilter->status_filter($data,$request->statusCode);
        }

        if($request->has('balanceMin') && $request->balanceMin != null)
        {
            $data = $this->balanceFilter->balance_min_filter($data,$request->balanceMin);
        }

        if($request->has('balanceMax') && $request->balanceMax != null)
        {
            $data = $this->balanceFilter->balance_max_filter($data,$request->balanceMax);
        }

        if($request->has('currency') && $request->currency != null)
        {
            $data = $this->currencyFilter->currency_filter($data,$request->currency);
        }

        return response()->json($data);
    }
}
