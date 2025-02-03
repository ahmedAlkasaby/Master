<?php

namespace App\Http\Resources;

use App\Http\Resources\CaseResource;
use App\Models\CharityCase;
use App\Models\User;
use App\Traits\VolunteerTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VolunteerResource extends JsonResource
{
    use VolunteerTrait;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */


    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'city'=>new CityRecource($this->city),
            'region'=>new RegionResource($this->region),
            'gender'=>$this->gender,
            'total_cases'=>$this->cases,
            'image'=>url('uploads/'.$this->image),
            'cases_running' => $this->whenLoaded('CharityCases', function () {
                return $this->runningCases($this->id);
            }),
            'cases_finishing' => $this->whenLoaded('CharityCases', function () {
                return $this->finishedCases($this->id);
            }),
        ];
    }
}
