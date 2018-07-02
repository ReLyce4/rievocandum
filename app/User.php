<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function notes()
    {
        return $this->hasMany('App\Note');
    }

    public function getInfo($name) {
        return DB::table('users')->where('name', $name)->first();
    }

    public function getIdByName($name) {
        $userId = DB::table('users')->where('name', $name)->value('id');
        if(isset($userId)) {
            return $userId;
        } else {
            return -1;
        }
    }

    public function countNotes($name) {
        $userId = $this->getIdByName($name);
        return DB::table('notes')->where('user_id', $userId)->count();
    }
}
