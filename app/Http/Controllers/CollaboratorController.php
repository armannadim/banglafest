<?php

namespace App\Http\Controllers;


use App\Models\Person;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class CollaboratorController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        try {

            $response = [
                'collab' => []
            ];
            $statusCode = 200;
            $data = Person::all();
            //echo $data;
            //$data = Collaborator::all();
            //$users = User::all()->take(9);

            foreach ($data as $d) {
                //echo $d->User->Role->where('id', 4);
                //4 = collab
                if (sizeof($d->User->Role->where('id', 4)) > 0) {
                    $response['collab'][] = [
                        'id' => $d->id,
                        'first_name' => $d->first_name,
                        'last_name' => $d->last_name,
                        'name' => $d->name,
                        'city' => $d->city,
                        'country' => $d->Country->country_name,
                        'association' => $d->Association,
                        'user' => $d->User->Role,
                        'short_text' => $d->short_text,
                        'pic' => $d->pic,
                        'facebook' => $d->facebook,
                        'twitter' => $d->twitter,
                        'gplus' => $d->gplus,
                        'created_at' => $d->created_at,
                        'updated_at' => $d->updated_at,
                        'deleted_at' => $d->deleted_at
                    ];
                }
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response['collab'], $statusCode);
        }
    }

    
}

?>