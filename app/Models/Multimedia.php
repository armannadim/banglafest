<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Multimedia extends Model {

    protected $table = 'multimedia';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['filename'];

    public function Festival() {
        return $this->belongsTo('App\Models\Festival');
    }

    public function User() {
        return $this->belongsTo('App\Models\User');
    }
}
