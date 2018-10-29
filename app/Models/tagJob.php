<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tagJob extends Model
{
  protected $table = "tag_jobs";
  public $timestamps = false;

  protected $fillable = [
      'tag', 'job' 
  ];
}
