<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class WelcomeController extends Controller{

    public function index(){

        $data = array(
            'title'     => "Welcome to home page"
        );

        return view('pages.index')->with($data);
    }

    public function about(){

        $data = array(
            'title'     => "Welcome to about page"
        );
        return view('pages.about')->with($data);
    }

    public function contact(){

        $data = array(
            'title'     => "Welcome to contact page"
        );
        return view('pages.contact')->with($data);
    }

}
