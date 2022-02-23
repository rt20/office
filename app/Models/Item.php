<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'nama', 'tahun_perolehan', 'nup',  'merk','kondisi'
        
    ];

    public function borrows()
	{
		return $this->hasMany('App\Borrows');
	}
}
