<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cart' => SaleProductVariantResource::collection($this->products),
            'total' => $this->total,
            'created' => $this->created_at->format('Y-m-d H:i:s'),
            'payment_method' => $this->payment_method
        ];
    }
}
