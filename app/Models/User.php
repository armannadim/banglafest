<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable,
        CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /* RELATIONSHIP */

    public function Activity_log() {
        return $this->hasMany('App\Models\Activity_log');
    }
    
    public function Access_log() {
        return $this->hasMany('App\Models\Access_log');
    }
    
    public function Multimedia() {
        return $this->hasMany('App\Models\Multimedia');
    }

    public function Person() {
        return $this->belongsTo('App\Models\Person');
    }

    public function Festival() {
        return $this->belongsToMany("App\Models\Festival", "user_festival", "user_id", "festival_id")->withTimestamps()->withPivot("deleted_at");
    }

    public function Role() {
        return $this->belongsToMany("App\Models\Role", "user_role", "id_user", "id_role");
    }
    
}
