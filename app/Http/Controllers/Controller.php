<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\City;
use App\Models\Country;
use App\Models\Festival;
use App\Models\User;
use Response;
use Request;

abstract class Controller extends BaseController {

    use DispatchesJobs,
        ValidatesRequests;

    public function getRole($userId) {
        $user = User::find($userId);
        return $user->Role[0]->role;
    }

}
