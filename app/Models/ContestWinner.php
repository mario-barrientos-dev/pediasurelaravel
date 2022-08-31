<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContestWinner extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'contest_winners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contest_id', 'customer_id', 'code_id',
    ];

    public function scopeConfirmed($query)
    {
        return $query->where('confirmed', 1);
    }

    /**
     * Customer relationship
     */
    public function code()
    {
        return $this->belongsTo('App\Models\CustomerCode', 'code_id');
    }

    /**
     * Customer relationship
     */
    public function contest()
    {
        return $this->belongsTo('App\Models\Contest', 'contest_id');
    }

    /**
     * Customer relationship
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
}
