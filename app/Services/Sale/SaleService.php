<?php

namespace App\Services\Sale;

use LaravelEasyRepository\BaseService;

interface SaleService extends BaseService{

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function findById($id, $data);
}
