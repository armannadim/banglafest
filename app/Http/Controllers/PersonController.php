<?php

namespace App\Http\Controllers;

use App\Models\Person,
    App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Auth,
    View,
    Hash;

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
                    'username' => $d->User['username'],
                    'first_name' => $d->first_name,
                    'last_name' => $d->last_name,
                    'name' => $d->name,
                    'position' => $d->position,
                    'address' => $d->address,
                    'city' => $d->city,
                    'country' => $d->Country->country_name,
                    'contact_number' => $d->contact_number,
                    'email' => $d->email,
                    'status' => $d->status,
                    'registerd_by' => $d->CreatedBy['username'],
                    'user' => $d->User['Role'],
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
        $newData->first_name = isset($data['first_name']) ? $data['first_name'] : "";

        $newData->last_name = isset($data['last_name']) ? $data['last_name'] : "";
        $newData->name = isset($data['name']) ? $data['name'] : "";

        $newData->position = isset($data['position']) ? $data['position'] : "";
        $newData->address = $data['address'];
        $newData->city = isset($data['city']) ? trim(explode(',', $data['city'])[0]) : "";
        $newData->country_id = isset($data['city']) ? BackendController::getCountryID(trim(last(explode(',', $data['city'])))) : "";
        $newData->contact_number = $data['contact_number'];
        $newData->email = $data['email'];
        $newData->status = isset($data['status']) ? $data['status'] : "";
        $newData->short_text = isset($data['short_text']) ? $data['short_text'] : "";

        $newData->pic = isset($data['pic']) ? $data['pic'] : "";

        $newData->facebook = isset($data['facebook']) ? $data['facebook'] : "";
        $newData->twitter = isset($data['twitter']) ? $data['twitter'] : "";
        $newData->gplus = isset($data['gplus']) ? $data['gplus'] : "";
        $newData->created_by_users_id = Auth::id();



        if ($newData->save()) {
            $user = new User();
            $user->username = isset($data['username']) ? $data['username'] : "";
            $user->password = isset($data['username']) ? Hash::make($data['password']) : "";
            $user->email = isset($data['email']) ? $data['email'] : "";
            $user->role_id = isset($data['role']) ? $data['role'] : "";
            $user->person_id = $newData->id;
            $user->save();
            $statusCode = 200;
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
    public function show($id, $arrayResp = false) {
        try {

            $response = [];
            $statusCode = 200;

            $data = Person::find($id);

            $response = [
                'id' => $data->id,
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'name' => $data->name,
                'position' => $data->position,
                'address' => $data->address,
                'city' => $data->city,
                'country' => $data->Country['country_name'],
                'contact_number' => $data->contact_number,
                'email' => $data->email,
                'status' => $data->status,
                'registerd_by' => $data->CreatedBy['name'],
                'role' => $data->User->Role,
                'short_text' => $data->short_text,
                'pic' => $data->pic,
                'facebook' => $data->facebook,
                'twitter' => $data->twitter,
                'gplus' => $data->gplus,
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at,
                'deleted_at' => $data->deleted_at,
                'user' => $data->User
            ];
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            if ($arrayResp) {
                return $response;
            } else {
                return Response::json($response, $statusCode);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $data = [];
        //$data['data'] = json_decode(file(url('api/v1/festival/' . $id)));
        $data['title'] = "User edit";
        $data['sub_title'] = "Edit user data";
        $data['role'] = $this->getRole(Auth::user()->id);
        $data['data'] = $this->show($id, true);
        return View::make('person.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $response = [];
        $data = Request::all();

        $person = Person::find($id);
        $person->first_name = isset($data['first_name']) ? $data['first_name'] : $person->first_name;

        $person->last_name = isset($data['last_name']) ? $data['last_name'] : $person->last_name;
        $person->name = isset($data['name']) ? $data['name'] : $person->name;

        $person->position = isset($data['position']) ? $data['position'] : $person->position;
        $person->address = $data['address'];
        $person->city = isset($data['city']) ? trim(explode(',', $data['city'])[0]) : $person->city;
        $person->country_id = isset($data['city']) ? BackendController::getCountryID(trim(last(explode(',', $data['city'])))) : $person->country_id;
        $person->contact_number = $data['contact_number'];
        $person->email = $data['email'];
        $person->status = isset($data['status']) ? $data['status'] : "";
        $person->short_text = isset($data['short_text']) ? $data['short_text'] : "";

        $person->pic = isset($data['pic']) ? $data['pic'] : "";

        $person->facebook = isset($data['facebook']) ? $data['facebook'] : "";
        $person->twitter = isset($data['twitter']) ? $data['twitter'] : "";
        $person->gplus = isset($data['gplus']) ? $data['gplus'] : "";
        if ($person->save()) {
            $statusCode = 200;
        } else {
            $statusCode = 422;
        }
        if (isset($data['password'])) {
            $user = User::where('person_id', '=', $id)->firstOrFail();
            $user->password = Hash::make($data['password']);
            $user->save();
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