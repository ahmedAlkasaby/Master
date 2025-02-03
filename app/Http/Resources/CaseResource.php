<?php

namespace App\Http\Resources;

use App\Http\Resources\CategoryCaseResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\ItemResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\VolunteerResource;
use App\Models\Donation;
use App\Models\User;
use App\Traits\CaseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CaseResource extends JsonResource
{
    use CaseTrait;


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */


    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'user'=>new UserResource($this->user),
            'category_case'=>new CategoryCaseResource($this->category),
            'type'=>$this->type,
            'is_event'=>$this->is_event,
            'is_like'=>$this->check_case_in_likes($this->id),
            'is_donation'=>$this->check_donation_for_this_case($this->id),
            'is_need_volunteer'=>'no',
            'can_donation_for_this_case'=> $this->can_donation_for_this_case($this->id),
            // لو انتع اتبرعت للحاله دي وبيعطي السعر الي انت اتبرعت بيه لو اتيرعت
            'price_donation_for_this_case'=>(string)$this->check_donation_for_this_case_and_get_price($this->id),
            'title'=>$this->nameLangApi(),
            'description'=>$this->descriptionLangApi(),
            'priority'=>$this->priority,
            'repeating'=>$this->repeating,
            'next_donation_date'=>Carbon::parse($this->next_donation_date)->format('d/m/Y'),
            'date_start'=>Carbon::parse($this->date_start)->format('d/m/Y'),
            'date_end'=>Carbon::parse($this->date_end)->format('d/m/Y'),
            'remaining_days_until_end' => $this->remainingDaysUntilEnd(),
            'price'=>(string)$this->get_price(),
            'price_raised'=>(string)$this->get_price_raised(),
            'waiting_price'=> (string)$this->donations->where('confirm', 0)->sum(function($donation) {
                return $donation->get_price();
            }),
            'donators'=>(string)Donation::where('case_id',$this->id)->count(),
            'volunteer'=>new VolunteerResource($this->volunteer),
            'items'=>ItemResource::collection($this->items),
            'case_images'=>ImageResource::collection($this->images),
        ];
    }




}
