<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Performer extends Model {

    protected $table = 'performers';
    public $timestamps = true;

    /* public function Country() {
      return $this->belongsTo('App\Models\Country');
      }

      public function User() {
      return $this->hasMany('App\Models\User');
      }

      public function Festival() {
      return $this->hasMany('App\Models\Festival');
      } */

    public function Festival() {
        return $this->belongsToMany("App\Models\Festival", "fest_perf", "id_performer", "id_festival");
    }

}
