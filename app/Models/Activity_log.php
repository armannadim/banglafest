<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity_log extends Model {

    protected $table = 'activity_log';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function User() {
        return $this->belongsTo('App\Models\User');
    }

}
