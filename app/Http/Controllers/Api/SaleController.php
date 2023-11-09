<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Sale\SaleService;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function detail(Request $request, $id)
    {
        $data = $request->only(['key']);
        return $this->saleService->findById($id, $data)->toJson();
    }
}
