<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'item', 'tahun_perolehan', 'nup',  'merk','kondisi'
        
    ];

    public function borrow()
	{
		return $this->hasMany(Borrow::class, 'item_id');
	}
}
