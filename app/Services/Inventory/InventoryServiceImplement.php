<?php

namespace App\Services\Inventory;

use App\Helpers\Helper;
use App\Http\Resources\InventoryResource;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\Inventory\InventoryRepository;
use LaravelEasyRepository\Traits\ResultService;

class InventoryServiceImplement extends ServiceApi implements InventoryService{

    /**
     * set message api for CRUD
     * @param string $title
     * @param string $create_message
     * @param string $update_message
     * @param string $delete_message
     */
     protected $title = "";
     protected $create_message = "";
     protected $update_message = "";
     protected $delete_message = "";

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(InventoryRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    /**
     * @param $data
     * @return InventoryServiceImplement|ResultService|mixed
     */
    public function getAll($data)
    {
        try {
            if(!Helper::checkKey($data['key'])) {
                return $this->setCode(400)
                    ->setStatus(false)
                    ->setMessage('Unauthorized Access');
            }

            $results = $this->mainRepository->all();

            return $this->setCode(200)
                ->setStatus(true)
                ->setResult(InventoryResource::collection($results));
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }
    }
}
