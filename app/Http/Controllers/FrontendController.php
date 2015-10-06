<?php

namespace App\Http\Controllers;

/**
 * Description of FrontendController
 *
 * @author NAseq
 * @date 28-Aug-2015
 */
class FrontendController extends Controller {
    public function index() {
        $data = [];
        $data['title'] = "Festival";
        $data['sub_title'] = "List of the festivals";
        return view('frontend.pages.home', $data);
    }

    public function contactUs(){
        $data = [];
        $data['title'] = "Contact Us";
        $data['sub_title'] = "Any question or doubt, let us know..";
        return view('frontend.pages.contact', $data);
    }
    
    public function team(){
        $data = [];
        $data['title'] = "Team";
        $data['sub_title'] = "Hardworker to make it live...";
        return view('frontend.pages.team', $data);
    }
    
    public function sponsors(){
        $data = [];
        $data['title'] = "Sponsors";
        $data['sub_title'] = "Who helps us to make it happen...";
        return view('frontend.pages.sponsors', $data);
    }
    
    public function live(){
        $data = [];
        $data['title'] = "live";
        $data['sub_title'] = "Don't miss the program, watch it live....";
        return view('frontend.pages.live', $data);
    }
    
    public function allEvents(){
        $data = [];
        $data['title'] = "Events";
        $data['sub_title'] = "All the events....";
        return view('frontend.pages.all_events', $data);
    }
    /* TODO This function will load individual event with it's data.*/
    public function event($id){
        $data = [];
        $data['title'] = "Event";
        $data['sub_title'] = "Event tag....";
        return view('frontend.pages.event', $data);
    }
    
    public function calendar(){
        $data = [];
        $data['title'] = "Calendar";
        $data['sub_title'] = "Calendar....";
        return view('frontend.pages.calendar', $data);
    }
    
    public function services(){
        $data = [];
        $data['title'] = "Services";
        $data['sub_title'] = "How can we help you...";
        return view('frontend.pages.services', $data);
    }
    
    public function pastEvents(){
        $data = [];
        $data['title'] = "Events";
        $data['sub_title'] = "All the past events....";
        return view('frontend.pages.past', $data);
    }
}
