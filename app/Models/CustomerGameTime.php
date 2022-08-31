<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerGameTime extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'customer_game_time';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'game_id', 'time',
        'ip', 'user_agent'
    ];

    /**
     * Customer relationship
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    /**
     * Customer relationship
     */
    public function game()
    {
        return $this->belongsTo('App\Models\Game', 'game_id');
    }
}
