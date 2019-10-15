<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index()
    {
        $data = array(
            'title'     =>  'Service',
            'services'  =>  DB::table('services')->where('service_status', '=', 1)->get()
        );

        return view('pages.services')->with($data);
    }

    public function get_service_items(){
        $data = array(
            'title'     =>  'Service Item',
            'items'     =>  DB::table('service_items')->paginate(15)
        );

        return view('pages.service_items')->with($data);
    }

    public function get_service($id){

        $data = array(
            'title'     =>  DB::table('services')->where('service_slug', $id)->value('service_name'),
            'service'   =>  DB::table('services')->where('service_slug', '=', $id)->get()
        );

        return view('pages.service_items')->with($data);
    }
}
