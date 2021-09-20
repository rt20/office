<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Book extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

     #konversi format waktu
     public function getDateStartAttribute(){
        return Carbon::parse($this->attributes['date_start'])
            ->translatedFormat('l, d F Y');
    }
    public function getDateEndAttribute(){
        return Carbon::parse($this->attributes['date_end'])
            ->translatedFormat('l, d F Y');
    }
    public function getTimeStartAttribute(){
        return Carbon::parse($this->attributes['time_start'])
            ->translatedFormat('H:i');
    }
    public function getTimeEndAttribute(){
        return Carbon::parse($this->attributes['time_end'])
            ->translatedFormat('H:i');
    }
}
