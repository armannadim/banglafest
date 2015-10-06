<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class AssociationController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        try {

            $response = [
                'association' => []
            ];
            $statusCode = 200;
            $data = Association::all();
            //$users = User::all()->take(9);

            foreach ($data as $d) {
                $response['association'][] = [
                    'id' => $d->id,
                    'name' => $d->name,
                    'address' => $d->start_datetime,
                    'city' => $d->end_datetime,
                    'country' => $d->Country()->country_name,
                    'created_at' => $d->created_at,
                    'updated_at' => $d->updated_at,
                    'deleted_at' => $d->deleted_at,
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response['association'], $statusCode);
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
        $ass = new Association();
        $ass->name = $data['name'];
        $ass->address = $data['address'];
        $ass->address = $data['city'];
        $ass->address = $data['country_id'];
        if($ass->save()){
            $statusCode = 200;
            return Response::json($ass, $statusCode);
        }else{
            $statusCode = 422;
            return Response::json($ass, $statusCode);
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
                'association' => []
            ];
            $statusCode = 200;

            $data = Association::find($id);

            $response['association'][] = [
                'id' => $data->id,
                'name' => $data->name,
                'address' => $data->address,
                'city' => $data->city,
                'country' => $data->Country()->country_name,
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at,
                'deleted_at' => $data->deleted_at,
            ];
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response['association'], $statusCode);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        return View::make('association.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $response = [];
        if (Association::where('id', '=', $id)->update(Input::all())) {
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
        
        Association::find($id)->Festival()->detach();
        Association::find($id)->Person()->detach();
        
        $ass = Association::find($id);
        $a = Association::where('id', $id)->delete();        

        $response = [];
        $response["name"] = $ass->name;
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