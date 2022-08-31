<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contest extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'contests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'contest_date',
        'total_winners', 'active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'contest_date' => 'datetime',
    ];

    public function scopeNext($query)
    {
        return $query->where('contest_date', '>', Carbon::now())
            ->orderBy('contest_date', 'asc')
            ->limit(1);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function winners()
    {
        return $this->hasMany('App\Models\ContestWinner', 'contest_id')
            ->orderBy('created_at', 'asc');
    }
}
