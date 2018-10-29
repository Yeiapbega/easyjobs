<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = "jobs";
    public $timestamps = false;

    protected $fillable = 
    [
        'title', 'description', 'images', 'hours', 'pay', 'publicate_date', 'finish_date', 'state', 'offerter', 'token'
    ];
}
