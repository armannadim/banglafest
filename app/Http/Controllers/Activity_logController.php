<?php

namespace App\Http\Controllers;

Use App\Activity_log;
Use App\Models\User;
Use Response;


class Activity_logController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        try {

            $response = [
                'logs' => []
            ];
            $statusCode = 200;
            $logs = Activity_log::all();
            //$users = User::all()->take(9);

            foreach ($logs as $log) {
                $user = User::find($log->user_id);
                $response['logs'][] = [
                    'id' => $log->id,
                    'activity' => $log->activity,
                    'user' => $log->User->name ,//$user['name'] . ", " . $user['full_name'],
                    'created_at' => $log->created_at,
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            //echo json_encode($response['logs']);
            //return response()->json($response);
            return Response::json($response['logs'], $statusCode);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($data) {
        return User::create([
                    'activity' => $data['activity'],
                    'user_id' => Auth::user()->id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $log = new Activity_log(Request::all());
        $log->user_id = Auth::user()->id;
        $log->save();
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
                'log' => []
            ];
            $statusCode = 200;

            $log = Activity_log::find($id);
            $user = User::find($log->user_id);
            $response = [
                'id' => $log->id,
                'activity' => $log->activity,
                'user' => $user->name . ", " . $user->full_name,
                'created_at' => $log->created_at
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
    }

}

?>