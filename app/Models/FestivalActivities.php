<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FestivalActivities extends Model {

    protected $table = 'festival_activities';
    public $timestamps = false;

    public function Festival() {
        return $this->belongsTo('App\Models\Festival');
    }

}
