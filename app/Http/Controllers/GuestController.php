<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class GuestController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        try {

            $response = [
                'guest' => []
            ];
            $statusCode = 200;
            $data = Guest::all();
            //$users = User::all()->take(9);

            foreach ($data as $d) {
                $response['guest'][] = [
                    'id' => $d->id,
                    'name' => $d->name,
                    'description' => $d->description,
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response['guest'], $statusCode);
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
        $newData = new Guest();
        $newData->name = $data['name'];
        $newData->description = $data['description'];
        
        if ($newData->save()) {
            $statusCode = 200;
            return Response::json($newData, $statusCode);
        } else {
            $statusCode = 422;
            return Response::json($newData, $statusCode);
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
                'guest' => []
            ];
            $statusCode = 200;

            $data = Guest::find($id);

            $response['association'][] = [
                'id' => $data->id,
                'name' => $data->name,
                'description' => $data->description
            ];
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response['guest'], $statusCode);
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
        if (Guest::where('id', '=', $id)->update(Input::all())) {
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
        
        Guest::find($id)->Festival()->detach();
        
        $guest = Guest::find($id);
        $a = Guest::where('id', $id)->delete();        

        $response = [];
        $response["name"] = $guest->name;
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