<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acccess_log extends Model {

    protected $table = 'access_log';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function User() {
        return $this->belongsTo('App\Models\User');
    }

}
