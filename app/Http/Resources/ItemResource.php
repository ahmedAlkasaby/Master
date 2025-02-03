<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,

            'category'=>$this->category->nameLangApi(),
            'name'=>$this->nameLangApi(),
            'amount'=>$this->pivot->amount,
            'amount_raised'=>$this->pivot->amount_raised
        ];
    }
}
