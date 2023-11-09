<?php

namespace App\Services\Sale;

use App\Helpers\Helper;
use App\Http\Resources\InventoryResource;
use App\Http\Resources\SaleResource;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\Sale\SaleRepository;
use LaravelEasyRepository\Traits\ResultService;

class SaleServiceImplement extends ServiceApi implements SaleService{

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

    public function __construct(SaleRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    /**
     * @param $id
     * @param $data
     * @return SaleServiceImplement|ResultService|mixed
     */
    public function findById($id, $data)
    {
        try {
            if(!Helper::checkKey($data['key'])) {
                return $this->setCode(400)
                    ->setStatus(false)
                    ->setMessage('Unauthorized Access');
            }

            $result = $this->mainRepository->findOrFail($id);

            return $this->setCode(200)
                ->setStatus(true)
                ->setResult(new SaleResource($result));
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }
    }
}
