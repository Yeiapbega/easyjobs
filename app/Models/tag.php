<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
  protected $table = "tags";
  public $timestamps = false;

  protected $fillable = [
      'name'
  ];
}
