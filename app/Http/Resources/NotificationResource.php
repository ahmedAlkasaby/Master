<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class NotificationResource extends JsonResource
{

    public function getMessagesAttribute()
    {
        $auth=Auth::guard('api')->user();
        $lang = $auth->lang;
        $messages = json_decode($this->data['messages'], true);
        return $messages[$lang] ?? $messages;
    }

    public function toArray(Request $request): array
    {

        return [
            'message'=>$this->getMessagesAttribute(),
            'case_id'=>$this->data['case_id'],

        ];
    }
}
