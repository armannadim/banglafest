<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model {

    protected $table = 'persons';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /* public function representativePerson() {
      return $this->hasMany('Associations', 'fk_association_id');
      } */

    public function Association() {
        return $this->belongsToMany("App\Models\Association", "asso_pers", "id_person", "id_asso")->withPivot("position", "since", "deleted_at");
    }

    public function Festival() {
        return $this->belongsToMany("App\Models\Festival", "fest_person", "id_person", "id_festival")->withPivot("user_code");
    }

    public function Country() {
        return $this->belongsTo('App\Models\Country');
    }

    /* USER_ID of the user who has created this person's profile. */

    public function CreatedBy() {
        return $this->belongsTo('App\Models\User');
    }

    /* Users personal data */

    public function User() {
        return $this->hasOne('App\Models\User');
    }

}
