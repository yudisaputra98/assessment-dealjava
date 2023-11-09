<?php

namespace App\Services\Product;

use LaravelEasyRepository\BaseService;

interface ProductService extends BaseService{

    /**
     * @param $data
     * @return mixed
     */
    public function getAll($data);
}
