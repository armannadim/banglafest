<?php

namespace App\Http\Controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BackendController
 *
 * @author NAseq
 * @date 23-Jul-2015
 */
use App\Models\Country;
use App\Models\City;
use App\Models\Association;
use App\Models\Person;
use App\Models\Guest;
use App\Models\Performer;
use Response;
use Request;
use Input;
use Auth;
use Redirect;
use Validator;
use App\Models\User;
use DB;

class BackendController extends Controller {

    public function index() {
        $data = [];
        $data['title'] = "Festival";
        $data['sub_title'] = "List of the festivals";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('home', $data);
    }

    public function login() {
        $data = [];
        $data['title'] = "Festival";
        $data['sub_title'] = "List of the festivals";
        return view('auth.login', $data);
    }

    public function loggingIn() {
// validate the info, create rules for the inputs
        $rules = array(
            'username' => 'required', // make sure the email is an actual email
            'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('admin/login')
                            ->withErrors($validator) // send back all errors to the login form
                            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            if (Auth::attempt($userdata, Input::get('remember', 0))) {
                return Redirect::to('admin');
            }
        }


        return redirect('admin/login')->withErrors([
                    'credentials' => 'Username or password is not correct.',
        ]);
    }

    public function getLogout() {
        Auth::logout();
        return redirect('admin/login');
    }

    /* INBOX VIEWS */

    function getInbox() {
        $data = [];
        $data['title'] = "Inbox";
        $data['sub_title'] = "Check all the message.";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('email.inbox', $data);
    }

    function getComposeMail() {
        $data = [];
        $data['title'] = "Compose";
        $data['sub_title'] = "Send message.";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('email.compose', $data);
    }

    /* END Inbox views */
    /* USER VIEW */

    public function u_index() {
        $data = [];
        $data['title'] = "Users";
        $data['sub_title'] = "List of active users";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('users.user', $data);
    }

    public function u_create() {
        $data = [];
        $data['title'] = "New User";
        $data['sub_title'] = "List of the festivals";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('users.create', $data);
    }

    public function u_edit() {
        $data = [];
        $data['title'] = "Add Festival";
        $data['sub_title'] = "New festival";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('users.edit', $data);
    }

    /* PERSON VIEW */

    public function p_index() {
        $data = [];
        $data['title'] = "User";
        $data['sub_title'] = "User details";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('person.person', $data);
    }

    public function p_create() {
        $data = [];
        $data['title'] = "Add User";
        $data['sub_title'] = "New User";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('person.create', $data);
    }

    public function p_edit() {
        $data = [];
        $data['title'] = "Edit user";
        $data['sub_title'] = "Edit user personal details";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('person.edit', $data);
    }

    /* Multimedia VIEW */

    public function mm_index() {
        $data = [];
        $data['title'] = "Gallery";
        $data['sub_title'] = "All gallery items";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('multimedia.multimedia', $data);
    }

    public function mm_create() {
        $data = [];
        $data['title'] = "Add Images/Video";
        $data['sub_title'] = "Add new files to the gallery";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('multimedia.create', $data);
    }

    public function mm_edit() {
        $data = [];
        $data['title'] = "Add Festival";
        $data['sub_title'] = "New festival";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('multimedia.edit', $data);
    }

    /* Festival VIEW */

    public function f_index() {
        $data = [];
        $data['title'] = "Festival";
        $data['sub_title'] = "List of the festivals";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('festival.festival', $data);
    }

    public function f_create() {
        $data = [];
        $data['title'] = "Add Festival";
        $data['sub_title'] = "New festival";
        $data['role'] = $this->getRole(Auth::user()->id);
        return view('festival.create', $data);
    }

    public function f_edit($id) {
        $data = [];
        $data['title'] = "Add Festival";
        $data['sub_title'] = "New festival";
        $data['role'] = $this->getRole(Auth::user()->id);
        $data['data'] = FrontendController::show($id);
        return view('festival.edit', $data);
    }

    /* JSON DATA */

    public function getCity($country = null) {
        try {

            $response = [];
            $statusCode = 200;
            //$city = City::all();
            $city = City::where('city_accent', 'like', '%' . $country . '%')->take(10)->get();

            foreach ($city as $c) {
                $response[] = [
                    'id' => $c->id,
                    'city_accent' => $c->city_accent . ' (' . $c->country_id . ')'
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response, $statusCode);
        }
    }

    Public function getCountry() {
        try {
            $response = [];
            $statusCode = 200;
            $country = Country::orderBy('country_name', 'ASC')->get();

            foreach ($country as $c) {
                $response[] = [
                    'id' => $c->id,
                    'country_name' => $c->country_name
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response, $statusCode);
        }
    }

    public function getFestival($user = null, $city = null) {
        try {
            $response = [];
            $statusCode = 200;
            $festival = Festival::all();
            if ($user != null) {
                $festival = Festival::where('user_id', $user)->get();
            } elseif ($city != null) {
                $festival = Festival::where('city_id', $city)->get();
            } elseif ($user != null && $city != null) {
                $festival = Festival::where('user_id', $user)->where('city_id', $city)->get();
            }

            foreach ($festival as $f) {
                $response[] = [
                    'id' => $f->id,
                    'name' => $f->name
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response, $statusCode);
        }
    }

    public function getAssociation($asso = null) {
        try {
            $response = [];
            $statusCode = 200;
            //$city = City::all();
            $id = null;
            if (!is_numeric($asso)) {
                $asso = Association::where('name', 'like', '%' . $asso . '%');
            } else {
                $id = Request::segment(2);
            }

            if ($id != null) {
                $asso = Association::where('country_id', 'like', $this->getCountryIdOfFestival($id));
            }

            $asso = $asso->get();
            foreach ($asso as $a) {
                $response[] = [
                    'id' => $a->id,
                    'name' => $a->name . ' (' . $a->address . ')'
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response, $statusCode);
        }
    }

    public static function getCountryIdOfFestival($id) {
        return DB::table('festival')
                        ->where('id', '=', $id)
                        ->pluck('country_id');
    }

    public static function getCountryId($country) {
        $id = Country::where('country_name', 'like', $country)->firstOrFail();
        return $id['id'];
    }

    public function getPerson($id = null) {
        try {
            $response = [];
            $statusCode = 200;
            //$city = City::all();
            
            $id = Request::segment(2);


            if ($id != null) {
                $id = Person::where('country_id', 'like', $this->getCountryIdOfFestival($id));
            }

            $id = $id->get();
            foreach ($id as $a) {
                $response[] = [
                    'id' => $a->id,
                    'value' => $a->first_name . ' ' . $a->last_name . ', ' . $a->name . ' (' . $a->city . ')'
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response, $statusCode);
        }
    }
    
    public function getGuest() {
        try {
            $response = [];
            $statusCode = 200;
            $guest = Guest::all();
            
            
            
            foreach ($guest as $a) {
                $response[] = [
                    'id' => $a->id,
                    'value' => $a->name . ' (' . $a->description . ')'
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response, $statusCode);
        }
    }
    
    public function getPerformer() {
        try {
            $response = [];
            $statusCode = 200;
            $performer = Performer::all();
            
            
            
            foreach ($performer as $a) {
                $response[] = [
                    'id' => $a->id,
                    'value' => $a->name . ' (' . $a->description . ')'
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return Response::json($response, $statusCode);
        }
    }

    public function RemoveSchedule($id_activity){
        \App\Models\FestivalActivities::where("id_activity", "=", $id_activity)->delete();
    }
}
