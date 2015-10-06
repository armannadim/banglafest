<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        try {

            $response = [
                'users' => []
            ];
            $statusCode = 200;
            $users = User::all()->take(9);

            foreach ($users as $user) {

                $response['users'][] = [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'created_at' => $user->created_at
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response, $statusCode);
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
        $user = new User();
        $user->username = $data['username'];
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];

        if ($user->save()) {
            $statusCode = 200;
            return Response::json($user, $statusCode);
        } else {
            $statusCode = 422;
            return Response::json($user, $statusCode);
        }
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
                'user' => []
            ];
            $statusCode = 200;

            $user = User::find($id);

            $response = [
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
                'created_at' => $user->created_at
            ];
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response, $statusCode);
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
        if (User::where('id', '=', $id)->update(Input::all())) {
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
        
        User::find($id)->Festival()->detach();
        User::find($id)->Role()->detach();
        
        $user = User::find($id);

        $u = User::where('id', $id)->delete();

        $response = [];
        $response["name"] = $user->username;
        if ($u->trashed()) {
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