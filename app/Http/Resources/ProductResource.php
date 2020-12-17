<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $model = $this->resource;
        return [
            'id' => $model->id,
            'size' => $model->size,
            'brand' => $model->brand,
            'product_code' => $model->product_code
        ];
    }
}
