<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Book extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'start','end','agenda','total','participant','quantity','room','meetingid',
        'password','link','pic'
        
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

     #konversi format waktu
    //  public function getCreatedAtAttribute($value)
    //  {
    //      return Carbon::parse($value)->timestamp;
    //  }
    //  public function getUpdatedAtAttribute($value)
    //  {
    //      return Carbon::parse($value)->timestamp;
    //  }
}
