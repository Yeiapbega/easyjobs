<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subTag extends Model
{
	protected $table = "sub_tags";
	public $timestamps = false;

	protected $fillable = 
	[
		'name', 'tag'
	];
}
