<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $data = array(
//            'title'     =>  'Event organisers',
//            'events'    =>  Event::all()
//        );

        if(request()->ajax()){

            $start = (!empty($_GET["event_start"])) ? ($_GET["event_start"]) : ('');
            $end = (!empty($_GET["event_end"])) ? ($_GET["event_end"]) : ('');

            $data = Event::whereDate('event_start', '>=', $start)->whereDate('event_end',   '<=', $end)->get(['event_id','event_title','event_start', 'event_end']);
            return response()->json($data);
        }

        return view('events.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('events.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertArr = [ 'event_title' => $request->title,
            'event_start' => $request->start,
            'event_end' => $request->end
        ];
        $event = Event::insert($insertArr);
        return response()->json($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
