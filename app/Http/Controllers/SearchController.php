<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(){
        $data = array(
            'title'     =>     'Let\' search some blogs'
        );

        return view('pages.search')->with($data);
    }

    public function autocomplete(Request $request){
        if($request->ajax()){
            $output="";
            $posts= DB::table('posts')->where('title','LIKE','%'.$request->search."%")->get();
            if($posts)
            {
                foreach ($posts as $key => $post) {
                    $output.='<tr>'.
                        '<td>'.$post->id.'</td>'.
                        '<td>'.$post->title.'</td>'.
                        '<td>'.$post->body.'</td>'.
                        '</tr>';
                }

                return Response($output);
            }
        }
    }
}
