<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Support\Facades\DB;

class Qms extends Model
{
    protected $table='qms';
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
    public static function getQms()
    {
        $Qms = DB::table('users')
                -> join ('qms_user','users.id','=','qms_user.user_id')
                -> join ('qms','qms_user.qms_id','=','qms.id')
                -> select ('users.name', 'users.email', 'qms.id', 'qms.judul', 'qms.nomor')
                -> orderBy('users.name', 'asc')
                -> get()->toArray();
        return $Qms;
    }
}
