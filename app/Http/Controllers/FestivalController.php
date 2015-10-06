<?php

namespace App\Http\Controllers;

use App\Festival;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use View;
use Auth;

class FestivalController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        try {

            $response = [
                'festival' => []
            ];
            $statusCode = 200;
            $festival = Festival::all();
            //$users = User::all()->take(9);

            foreach ($festival as $f) {
                $response['festival'][] = [
                    'id' => $f->id,
                    'name' => $f->name,
                    'start_datetime' => date(DATE_ISO8601, strtotime($f->start_datetime)),
                    'end_datetime' => date(DATE_ISO8601, strtotime($f->end_datetime)),
                    'city' => $f->city,
                    'country' => $f->Country->country_name,
                    'description' => $f->description,
                    'link' => $f->link,
                    'twitter' => $f->twitter,
                    'facebook' => $f->facebook,
                    'budget' => $f->budget,
                    'created_at' => $f->created_at,
                    'cover' => $f->Multimedia->where('poster', '2')
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response['festival'], $statusCode);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('festival.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $data = Request::all();

        $s = new Festival();
        $s->name = $data['name'];
        $s->start_datetime = date("Y-m-d H:i:s", strtotime($data['start_datetime']));
        $s->end_datetime = date("Y-m-d H:i:s", strtotime($data['end_datetime']));
        $s->city = isset($data['city']) ? trim(explode(',', $data['city'])[0]) : "";
        $s->country = isset($data['city']) ? BackendController::getCountryID(trim(last(explode(',', $data['city'])))) : "";
        $s->venue = isset($data['venue']) ? $data['venue'] : "";
        $s->description = isset($data['description']) ? $data['description'] : "";
        $s->link = isset($data['link']) ? $data['link'] : "";
        $s->facebook = isset($data['facebook']) ? $data['facebook'] : "";
        $s->twitter = isset($data['twitter']) ? $data['twitter'] : "";
        $s->budget = isset($data['budget']) ? $data['budget'] : "";
        if ($s->save()) {
            $statusCode = 200;
        } else {
            $statusCode = 422;
        }
        return Response::json($s, $statusCode);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id, $arrayResp) {
        try {

            $response = [];
            $statusCode = 200;

            $festival = Festival::find($id);

            $response = [
                'name' => $festival->name,
                'start_datetime' => date(DATE_ISO8601, strtotime($festival->start_datetime)),
                'end_datetime' => date(DATE_ISO8601, strtotime($festival->end_datetime)),
                'city' => $festival->city,
                'coutnry_id' => $festival->coutnry_id,
                'country' => $festival->Country->country_name,
                'venue' => $festival->venue,
                'description' => $festival->description,
                'link' => $festival->link,
                'facebook' => $festival->facebook,
                'twitter' => $festival->twitter,
                'budget' => $festival->budget,
                'updated_at' => $festival->updated_at,
                'created_at' => $festival->created_at,
                'photos' => $festival->Multimedia->where("file_type", "image"),
                'videos' => $festival->Multimedia->where("file_type", "video"),
                'performers' => $festival->Performer,
                'guests' => $festival->Guest,
                'persons' => $festival->Person,
                'associations' => $festival->Association,
                'events' => $festival->Events
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
        $data['title'] = "Festival";
        $data['sub_title'] = "Edit festival";
        $data['role'] = $this->getRole(Auth::user()->id);
        $data['data'] = $this->show($id, true);
        return View::make('festival.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $response = [];
        if (Festival::where('id', '=', $id)->update(Input::all())) {
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

        Festival::find($id)->Person()->detach();
        Festival::find($id)->Guest()->detach();
        Festival::find($id)->Performer()->detach();
        Festival::find($id)->Association()->detach();
        Festival::find($id)->User()->detach();


        $festival = Festival::find($id);
        $f = Festival::where('id', $id)->delete();


        $response = [];
        $response["name"] = $festival->name;
        if ($f->trashed()) {
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