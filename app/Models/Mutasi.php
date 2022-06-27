<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
		'item' => 'array'
		
    ];

    public function item()
	{
		return $this->belongsTo('App\Item');
	}

    
}
