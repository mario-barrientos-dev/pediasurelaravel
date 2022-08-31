<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WinnerHall extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'winners_hall';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'video',
        'image', 'order',
    ];
}
