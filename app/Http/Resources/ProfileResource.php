<?php

namespace App\Http\Resources;

use App\Traits\ProfileTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    use ProfileTrait;
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
            'gender'=>$this->gender,
            'location'=>'',
            'city'=>new CityRecource($this->city),
            'region'=>new RegionResource($this->region),
            'image'=>url('uploads/'.$this->image),
            'total_your_donations'=>$this->amount,
            'donation_cases'=>$this->donations(0,'get',1),
            'donation_events'=>$this->donations(1,'get',1),
            'total_cases'=>$this->donations(0,'count',1),

            'total_events'=>$this->donations(1,'count',1),
            'total_waiting_confirmation'=>$this->donations(0,'count',0) +$this->donations(1,'count',0) ,
            'donation_cases'=>$this->donations(0,'get',1),
            'donation_events'=>$this->donations(1,'get',1),
            'donation_waiting_confirmation'=>$this->donations(0,'get',0),
            // 'donationsList'=>$this->donationsList(1,1)

        ];
    }
}
