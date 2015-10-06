<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model {

    protected $table = 'guest';
    public $timestamps = true;

    /*public function Country() {
        return $this->belongsTo('App\Models\Country');        
    }

    public function User() {
        return $this->hasMany('App\Models\User');
    }
    
    public function Festival() {
        return $this->hasMany('App\Models\Festival');
    }*/

    public function Festival() {
        return $this->belongsToMany("App\Models\Festival", "fest_guest", "id_guest", "id_festival");
    }
}
