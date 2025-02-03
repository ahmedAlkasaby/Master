<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Carbon\Carbon;


class User extends Authenticatable implements LaratrustUser,JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable   , HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'image',
        'lang',
        'theme',
        'type',
        'cases',
        'amount',
        'password',
        'email_verified_at',
        'city_id',
        'region_id',
        'gender',
        'phone_verified_at',
        'role',
        'is_admin',
        'address',
        'latitude',
        'longitude'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getJWTIdentifier()
    {
      return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
      return [
        'email'=>$this->email,
        'name'=>$this->name
      ];
    }

    public function devices()
    {
        return $this->hasMany(Device::class,'user_id','id');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class,'doner_id','id');
    }

    public function likeCases()
    {
        return $this->belongsToMany(CharityCase::class, 'likes','user_id','case_id')->withTimestamps();
    }


    public function CharityCases()
    {
        return $this->hasMany(CharityCase::class,'volunteer_id','id');
    }

    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }

    public function region(){
        return $this->belongsTo(Region::class, 'region_id','id');
    }


    public function scopeFilter($query, $search = null)
    {
        $query->when($search, function ($q, $search) {
            $q->where('name', 'like', '%' . $search . '%')->
            orWhere('phone', 'like', '%' . $search . '%');
        });
    }



}
