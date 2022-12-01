<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;
    #protected $guarded = [];
    protected $fillable = [
      'user_before', 'item_id', 'location_before','tgl_mutasi','user_after','location_after','keterangan',
  ];
    protected $casts = [
		'item' => 'array'
		 
    ];

    public function item()
	{
		return $this->belongsTo('App\Item');
	}

    
}
