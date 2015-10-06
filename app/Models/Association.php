<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Association extends Model {

    protected $table = 'associations';
    public $timestamps = true;

    public function Country() {
        return $this->belongsTo('App\Models\Country');        
    }

    /*public function User() {
        return $this->hasMany('App\Models\User');
    }
    
    public function Festival() {
        return $this->hasMany('App\Models\Festival');
    }*/

    public function Festival(){
        return $this->belongsToMany("App\Models\Festival", "fest_asso", "id_associations", "id_festival");
    }
    
    public function Person(){
        return $this->belongsToMany("App\Models\Person", "asso_pers", "id_associations", "id_person")->withPivot("position", "since", "deleted_at");
    }
    
    public function Collaborator() {
        return $this->hasMany('App\Models\Collaborator');
    }
}
