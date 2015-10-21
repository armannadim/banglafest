<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Auth;

class PersonController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        try {

            $response = [
                'person' => []
            ];
            $statusCode = 200;
            $data = Person::all();
            //$users = User::all()->take(9);

            foreach ($data as $d) {
                $response['person'][] = [
                    'id' => $d->id,
                    'first_name' => $d->first_name,
                    'last_name' => $d->last_name,
                    'name' => $d->name,
                    'position' => $d->position,
                    'address' => $d->address,
                    'city' => $d->city,
                    'country' => $d->Country()->country_name,
                    'contact_number' => $d->contact_number,
                    'email' => $d->email,
                    'status' => $d->status,
                    'registerd_by' => $d->CreatedBy()->name,
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
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response['person'], $statusCode);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $data = Request::all();
        $newData = new Person();
        $newData->first_name = isset($data['first_name'])? $data['first_name']:"";;
        $newData->last_name = isset($data['last_name'])? $data['last_name']:"";;
        $newData->name = isset($data['name'])? $data['name']:"";;
        $newData->position = isset($data['position'])? $data['position']:"";
        $newData->address = $data['address'];
        $newData->city = isset($data['city']) ? trim(explode(',', $data['city'])[0]) : "";        
        $newData->country_id = isset($data['city']) ? BackendController::getCountryID(trim(last(explode(',', $data['city'])))) : "";
        $newData->contact_number = $data['contact_number'];
        $newData->email = $data['email'];
        $newData->status = isset($data['status'])? $data['status']:"" ;
        $newData->short_text = isset($data['short_text'])? $data['status']:"";
        
        $newData->pic = isset($data['pic'])? $data['pic']:"";
        
        $newData->facebook = isset($data['facebook'])? $data['facebook']:"";
        $newData->twitter = isset($data['twitter'])? $data['twitter']:"";
        $newData->gplus = isset($data['gplus'])? $data['gplus']:"";        
        $newData->created_by_users_id = Auth::id();

        if ($newData->save()) {
            $statusCode = 200;
            //return Response::json($newData, $statusCode);
        } else {
            $statusCode = 422;
            //return Response::json($newData, $statusCode);
        }
        return $newData;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        try {

            $response = [
                'person' => []
            ];
            $statusCode = 200;

            $data = Person::find($id);

            $response['person'][] = [
                'id' => $data->id,
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'name' => $data->name,
                'position' => $data->position,
                'address' => $data->address,
                'city' => $data->city,
                'country' => $data->Country()->country_name,
                'contact_number' => $data->contact_number,
                'email' => $data->email,
                'status' => $data->status,
                'registerd_by' => $data->CreatedBy()->name,
                'user' => $data->User->Role,
                'short_text' => $data->short_text,
                'pic' => $data->pic,
                'facebook' => $data->facebook,
                'twitter' => $data->twitter,
                'gplus' => $data->gplus,
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at,
                'deleted_at' => $data->deleted_at
            ];
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response['person'], $statusCode);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $response = [];
        if (Person::where('id', '=', $id)->update(Input::all())) {
            $response["result"] = "Updated";
            $statusCode = 200;
        } else {
            $statusCode = 422;
            $response["result"] = "Not updated";
        }
        return Response::json($response, $statusCode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {

        Performer::find($id)->Festival()->detach();
        Performer::find($id)->Association()->detach();

        $person = Person::find($id);
        $a = Person::where('id', $id)->delete();

        $response = [];
        $response["name"] = $person->name;
        if ($a > trashed()) {
            $statusCode = 200;
            $response['result'] = "deleted";
        } else {
            $statusCode = 422;
            $response['result'] = "Cannot delete.";
        }
        return Response::json($response, $statusCode);
    }

}

?>