<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            'title'=>$this->nameLangApi(),
            'description'=>$this->descriptionLangApi(),
            // 'image'=>{{ url('uploads/'.$this->image) }},
            'image'=>url('uploads/'.$this->image),
            'case_id'=>$this->case_id,
            'case'=>new CaseResource($this->case)
        ];
    }
}
