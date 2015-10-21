<?php

namespace App\Http\Controllers;

use Input;
use App\Models\Multimedia;
use App\Models\Festival;
use App\Models\User;
use View;
use Response;
use Request;
use Auth;

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
        $data = Request::all();
        $statusCode = 422;
        $path_to_image_directory = 'images/events/' . $data['festival_id'] . '/fullsized/';
        $path_to_thumbs_directory = 'images/events/' . $data['festival_id'] . '/thumbs/';
        $newData = new Multimedia();
        $newData->user_id = Auth::user()->id;

        $response = [
            'files' => []
        ];
        if (isset($_FILES['files'])) {

            if (preg_match('/[.](jpg)|(gif)|(png)|(JPG)|(GIF)|(PNG)$/', $_FILES['files']['name'][0])) {

                $filename = $_FILES['files']['name'][0];
                $source = $_FILES['files']['tmp_name'][0];
                $target = $path_to_image_directory . $filename;
                if (!file_exists($path_to_image_directory)) {
                    mkdir($path_to_image_directory, 0777, true);
                }
                move_uploaded_file($source, $target);

                $thumbFile = $this->createThumbnail($filename, $path_to_image_directory, $path_to_thumbs_directory);

                $newData->festival_id = isset($data['festival_id']) ? $data['festival_id'] : "";
                $newData->file_type = $_FILES['files']['type'][0];
                $newData->filename = asset($target);
                $newData->thumb = asset($thumbFile);
                $newData->poster = isset($data['poster']) ? "1" : "0";

                if ($newData->save()) {
                    $response['files'][] = [
                    'name' => $filename,
                    'filetype' => $_FILES['files']['type'][0],
                    "url" => asset($target),
                    "thumbnailUrl"=> asset($thumbFile)                 
                    ];
                    $statusCode = 200;
                } else {
                    $response['files'][] = [
                        'name' => $filename,
                        'error' => 'File is not uploaded.',
                    ];
                    $statusCode = 422;
                }
            }
        }


        return Response::json($response, $statusCode);
    }

    function createThumbnail($filename, $path_to_image_directory, $path_to_thumbs_directory) {

        $final_width_of_image = 100;

        if (!file_exists($path_to_thumbs_directory)) {
            mkdir($path_to_thumbs_directory, 0777, true);
        }
        if (preg_match('/[.](jpg)|(JPG)$/', $filename)) {
            $im = imagecreatefromjpeg($path_to_image_directory . $filename);
        } else if (preg_match('/[.](gif)|(GIF)$/', $filename)) {
            $im = imagecreatefromgif($path_to_image_directory . $filename);
        } else if (preg_match('/[.](png)|(PNG)$/', $filename)) {
            $im = imagecreatefrompng($path_to_image_directory . $filename);
        }

        $ox = imagesx($im);
        $oy = imagesy($im);

        $nx = $final_width_of_image;
        $ny = floor($oy * ($final_width_of_image / $ox));

        $nm = imagecreatetruecolor($nx, $ny);

        imagecopyresized($nm, $im, 0, 0, 0, 0, $nx, $ny, $ox, $oy);

        if (!file_exists($path_to_thumbs_directory)) {
            if (!mkdir($path_to_thumbs_directory)) {
                die("There was a problem. Please try again!");
            }
        }

        imagejpeg($nm, $path_to_thumbs_directory . $filename);
        /* $tn = '<img src="' . $path_to_thumbs_directory . $filename . '" alt="image" />';
          $tn .= '<br />Congratulations. Your file has been successfully uploaded, and a      thumbnail has been created.';
          echo $tn; */
        return $path_to_thumbs_directory . $filename;
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
        
        $m = Multimedia::find($id)->delete();
        

        $response = [];
        $response["filename"] = $m['filename'];
        $statusCode = 200;
        return Response::json($response, $statusCode);
    }

}

?>