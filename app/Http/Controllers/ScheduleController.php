<?php

namespace App\Http\Controllers;

use App\Models\FestivalActivities;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class ScheduleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        try {

            $response = [
                'schedule' => []
            ];
            $statusCode = 200;
            $data = Performer::all();
            //$users = User::all()->take(9);

            foreach ($data as $d) {
                $response['schedule'][] = [
                    'id' => $d->id,
                    'events' => $d->events,
                    'start_time' => $d->start_time,
                    'end_time' => $d->start_time,
                    'location' => $d->end_time,
                    'festival_id' => $d->festival_id
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response['schedule'], $statusCode);
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
        $festActi = new FestivalActivities();
        $festActi->events = $data['events'];
        $festActi->start_time = date("Y-m-d H:i:s", strtotime($data['start_datetime']));
        $festActi->end_time = date("Y-m-d H:i:s", strtotime($data['end_datetime']));
        $festActi->location = $data['location'];
        $festActi->festival_id = $data['festival_id'];

        if ($festActi->save()) {
            $statusCode = 200;
        } else {
            $statusCode = 422;
        }
        return Response::json($festActi, $statusCode);
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
                'schedule' => []
            ];
            $statusCode = 200;

            $data = FestivalActivities::findOrFail($id);

            $response['schedule'][] = [
                'id' => $data->id,
                'start_time' => $data->start_time,
                'end_time' => $data->end_time,
                'events' => $data->events,
                'location' => $data->location,
                'festival_id' => $data->festival_id
            ];
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response['schedule'], $statusCode);
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
        if (FestivalActivities::where('id_activity', '=', $id)->update(Input::all())) {
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

        FestivalActivities::find($id)->Festival()->detach();

        $schedule = FestivalActivities::find($id);
        $a = FestivalActivities::where('id', $id)->delete();

        $response = [];
        $response["events"] = $schedule->name;
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