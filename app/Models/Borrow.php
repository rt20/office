<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use HasFactory;

   // protected $guarded = [];
 protected $fillable = [
        'borrower', 'item_id', 'start','end','agenda','status','is_agree',
    ];    

protected $casts = [
		'item' => 'array'
		
    ]; 

    public function item()
	{
		return $this->belongsTo('App\Item');
	}

}
