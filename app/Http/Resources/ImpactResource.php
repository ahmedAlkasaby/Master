<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImpactResource extends JsonResource
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
            'case_id'=>$this->case_id,
            'impact_images'=>ImageResource::collection($this->images),
            'case'=>new CaseResource($this->whenLoaded('case')),
        ];
    }
}
