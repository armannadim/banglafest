<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    protected $table = 'country';
    public $timestamps = false;

    public function City() {
        return $this->hasMany('App\Models\City');
    }
    
    public function Festival() {
        return $this->hasMany('App\Models\Festival');
    }
    
    public function Association() {
        return $this->hasMany('App\Models\Association');
    }
    
    public function Person() {
        return $this->hasMany('App\Models\Person');
    }
    
    public function Collaborator() {
        return $this->hasMany('App\Models\Collaborator');
    }
}
