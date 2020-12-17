<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_code' => $model->order_code,
            'product_id' => $model->product,
            'quantity' => $model->quantity,
            'address' => $model->address
        ];
    }
}
