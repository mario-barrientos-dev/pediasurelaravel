<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerCode extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'customer_codes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'code',
        'ip', 'user_agent'
    ];

    /**
     * Customer relationship
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
}
