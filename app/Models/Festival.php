<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Festival extends Model {

    protected $table = 'festival';
    public $timestamps = true;
    protected $fillable = array('name', 'start_datetime', 'end_datetime', 'city', 'country_id', 'description', 'link', 'facebook', 'twitter', 'budget');

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /* public function City() {
      return $this->belongsTo('App\Models\City');
      } */

    public function Country() {
        return $this->belongsTo('App\Models\Country');
    }

    public function Multimedia() {
        return $this->hasMany('App\Models\Multimedia');
    }
    
    public function Events() {
        return $this->hasMany('App\Models\FestivalActivities');
    }

   

    /* M2M Relation */

    public function Association() {
        return $this->belongsToMany("App\Models\Association", "fest_asso", "id_festival", "id_associations");
    }

    public function Person() {
        return $this->belongsToMany("App\Models\Person", "fest_person", "id_festival", "id_person")->withPivot("user_code");
    }
    
    public function Guest() {
        return $this->belongsToMany("App\Models\Guest", "fest_guest", "id_festival", "id_guest");
    }
    
    public function Performer() {
        return $this->belongsToMany("App\Models\Performer", "fest_perf", "id_festival", "id_performer");
    }
    public function User() {
        return $this->belongsToMany("App\Models\User", "user_festival", "festival_id", "user_id")->withTimestamps();
    }

}
