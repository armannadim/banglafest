<?php

namespace App\Http\Controllers;

use Input;
use App\Multimedia;
use App\Festival;
use View;
use Response;

class MultimediaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        try {

            $response = [
                'multimedia' => []
            ];
            $statusCode = 200;
            $multimedia = Multimedia::all();
            //$users = User::all()->take(9);

            foreach ($multimedia as $m) {
                $user = User::find($m->user_id);
                $festival = Festival::find($m->user_id);
                $response['multimedia'][] = [
                    'id' => $m->id,
                    'festival' => $festival['name'] . ': ' . $festival['start_datetime'] . '-' . $festival['end_datetime'] . '[' . $festival['city'] . ']',
                    'file_type' => $m->file_type,
                    'filename' => $m->filename,
                    'user' => $user['name'] . ", " . $user['full_name'],
                    'created_at' => $m->created_at,
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response['multimedia'], $statusCode);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('multimedia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $s = Multimedia::create(Input::all());

        if ($s->isSaved()) {
            return Redirect::route('multimedia.index')
                            ->with('flash', 'The new user has been created');
        }

        return Redirect::route('multimedia.create')
                        ->withInput()
                        ->withErrors($s->errors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return $this->multimedia->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        return View::make('multimedia.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $s = User::update($id);

        if ($s->isSaved()) {
            return Redirect::route('multimedia.show', $id)
                            ->with('flash', 'The user was updated');
        }

        return Redirect::route('users.edit', $id)
                        ->withInput()
                        ->withErrors($s->errors());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $m = Multimedia::find($id);
        $mm = Multimedia::where('id', $id)->delete();

        $response = [];
        $response["filename"] = $user->filename;
        if ($mm->trashed()) {
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