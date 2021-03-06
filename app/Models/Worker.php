<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Worker extends Authenticatable
{
    //
    use HasApiTokens, Notifiable;
    protected $table = 'workers';
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function area(){
        return $this->belongsTo(Area::class, "area_id");
    }

    public function AauthAcessToken(){
        return $this->hasMany('\App\OauthAccessToken', "user_id");
    }
}
