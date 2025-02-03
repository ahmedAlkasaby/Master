<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MainModel extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => 'json',
        'description' => 'json',
    ];


    public function nameLang($lang = null)
    {
        if ($lang == null) {
            $user = Auth::user();
            $langUser = $user ? $user->lang : app()->getLocale();
            $defoultLang=app()->getLocale();
            return json_decode($this->name)->$langUser ?? json_decode($this->name)->$defoultLang;
        } else {
            return json_decode($this->name)->$lang ?? null ;
        }

    }


    public function descriptionLang($lang = null)
    {
        if ($lang == null) {

            $user = Auth::user();
            $langUser = $user ? $user->lang : app()->getLocale();
            $defoultLang=app()->getLocale();
            return json_decode( $this->description)->$langUser ?? json_decode( $this->description)->$defoultLang;
        } else {
            return json_decode($this->description)->$lang  ?? null;
        }
    }

    public function nameLangApi($lang = null)
    {
        if ($lang == null) {
            $user = Auth::guard('api')->user();
            $langUser = $user ? $user->lang : app()->getLocale();
            $defoultLang=app()->getLocale();
            return json_decode($this->name)->$langUser ?? json_decode($this->name)->$defoultLang;
        } else {
            return json_decode($this->name)->$lang ;
        }
    }

    public function descriptionLangApi($lang = null)
    {
        if ($lang == null) {
            $user = Auth::guard('api')->user();
            $langUser = $user ? $user->lang : app()->getLocale();
            $defoultLang=app()->getLocale();
            return json_decode( $this->description)->$langUser ?? json_decode( $this->description)->$defoultLang;
        } else {
            return json_decode($this->description)->$lang ;
        }
    }














}
