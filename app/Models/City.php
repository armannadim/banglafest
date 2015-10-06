<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $table = 'city';
    public $timestamps = false;

    public function Country() {
        return $this->belongsTo('App\Models\Country');        
    }

    public function User() {
        return $this->hasMany('App\Models\User');
    }
    
    public function Festival() {
        return $this->hasMany('App\Models\Festival');
    }

}
