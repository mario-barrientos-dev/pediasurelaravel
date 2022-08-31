<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, Notifiable;
    
    /**
     * The table associated with the model.
     */
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'identification',
        'last_name', 'email',
        'phone', 'password', 'active',
        'ip', 'user_agent'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the code records associated with the customer.
     */
    public function codes()
    {
        return $this->hasMany('App\Models\CustomerCode', 'customer_id')
            ->orderBy('created_at', 'desc');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Get customer games
     */
    public function game_codes()
    {
        return $this->hasMany('App\Models\GameCode', 'customer_id');
    }
}
