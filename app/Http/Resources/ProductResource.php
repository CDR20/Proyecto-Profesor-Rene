<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'image' => substr($this->image, 9),
            'shop_price' => $this->shop_price,
            'provider_price' => $this->provider_price,
            'provider' => [
                'id' => $this->provider_id,
                'name' => $this->provider->name
            ],
            'inversor' => [
                'id' => $this->inversor_id,
                'name' => $this->inversor->name
            ]
        ];
    }
}