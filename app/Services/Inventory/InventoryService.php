<?php

namespace App\Services\Inventory;

use LaravelEasyRepository\BaseService;

interface InventoryService extends BaseService{

    /**
     * @param $data
     * @return mixed
     */
    public function getAll($data);
}
