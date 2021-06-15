<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'borrower', 'item_id', 'is_agree','code', 'agenda','start', 'end'
        
    ];

    public function item()
	{
		return $this->belongsTo(Item::class, 'item_id');
	}

}
