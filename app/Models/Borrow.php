<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];
    protected $casts = [
		'item' => 'array'
		
    ];

    public function item()
	{
		return $this->belongsTo('App\Item');
	}

}
