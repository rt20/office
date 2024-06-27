<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Support\Facades\DB;

class Makro extends Model
{
    protected $table='makros';
    use HasFactory;
    protected $guarded = [];
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function isReadByUser()
    { 
        return $this->users
            ->pluck('id')
            ->contains(auth()->user()->id);
    }
    public static function getMakro()
    {
        $Makro = DB::table('users')
                -> join ('makro_user','users.id','=','makro_user.user_id')
                -> join ('makro','makro_user.makro_id','=','makro.id')
                -> select ('users.name', 'users.email', 'makro.id', 'makro.judul', 'makro.nomor')
                -> orderBy('users.name', 'asc')
                -> get()->toArray();
        return $Makro;
    }
}
