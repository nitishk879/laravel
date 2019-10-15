<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Segment;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpParser\Builder;

class ServiceController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     =>  'Services',
            'services'  =>  DB::table('services')->where('service_status', '=', 1)->get()
        );

        return view('services.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title'     => 'Add Service',
        );
        return view('services.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service_name' => 'required|unique:services|max:96',
            'service_status' => 'required',
            'service_banner' => 'image|nullable|max:2050',
            'service_slider1' => 'image|nullable|max:2050',
            'service_slider2' => 'image|nullable|max:2050',
            'slider_sm_1' => 'image|nullable|max:2050',
            'slider_sm_2' => 'image|nullable|max:2050'
        ]);

        if ($request->hasFile('service_banner')){
            $fileNameWithExt = $request->file('service_banner')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('service_banner')->getClientOriginalExtension();
            $fileNameBanner = $fileName . $fileExt;
            $path = $request->file('service_banner')->storeAs('public/service_banners', $fileNameBanner);

        }else{
            $fileNameBanner = 'default-banner.jpg';
        }

        if ($request->hasFile('service_slider1')){
            $fileNameWithExt = $request->file('service_slider1')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('service_slider1')->getClientOriginalExtension();
            $service_slider1 = $fileName . $fileExt;
            $path = $request->file('service_slider1')->storeAs('public/service_slider', $service_slider1);

        }else{
            $service_slider1 = 'default-service_slider1.jpg';
        }
        if ($request->hasFile('service_slider2')){
            $fileNameWithExt = $request->file('service_slider2')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('service_slider2')->getClientOriginalExtension();
            $service_slider2 = $fileName . $fileExt;
            $path = $request->file('service_slider2')->storeAs('public/service_slider', $service_slider2);

        }else{
            $service_slider2 = 'default-service_slider2.jpg';
        }

        if ($request->hasFile('slider_sm_1')){
            $fileNameWithExt = $request->file('slider_sm_1')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('slider_sm_1')->getClientOriginalExtension();
            $slider_sm_1 = $fileName . $fileExt;
            $path = $request->file('slider_sm_1')->storeAs('public/service_slider', $slider_sm_1);

        }else{
            $slider_sm_1 = 'default-banner.jpg';
        }
        if ($request->hasFile('slider_sm_2')){
            $fileNameWithExt = $request->file('slider_sm_2')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('slider_sm_2')->getClientOriginalExtension();
            $slider_sm_2 = $fileName . $fileExt;
            $path = $request->file('slider_sm_2')->storeAs('public/service_slider', $slider_sm_2);

        }else{
            $slider_sm_2 = 'default-banner.jpg';
        }

        $service = new Service();

        $service->service_name      =   $request->input('service_name');
        $service->service_status    =   $request->input('service_status');
        $service->service_slider1   =   $service_slider1;
        $service->service_slider2   =   $service_slider2;
        $service->service_banner    =   $fileNameBanner;
        $service->slider_sm_1       =   $slider_sm_1;
        $service->slider_sm_2       =   $slider_sm_2;
        $service->service_slug      = Str::slug($request->service_name, '-');
        $service->save();

        return redirect('services')->with('status', 'Service Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service_id = DB::table('services')->where('service_slug', $id)->value('service_id');

        $data = array(
            'title'     =>  DB::table('services')->where('service_slug', $id)->value('service_name'),
            'service'   =>  DB::table('services')->where('service_slug', $id)->first(),
            'brands'    =>  DB::table('service_brands')->where('service_id', $service_id)->take(11)->get(),
            'segments'  =>  DB::table('service_segments')->where('service_id', $service_id)->take(11)->get()
        );

        //return $data;

        return view('services.service_view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'title'         => Service::find($id)->value('service_name'),
            'service'       => Service::find($id)
        );

        return view('services.edit')->with($data);
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
        $validatedData = $request->validate([
            'service_name' => 'required|max:96',
            'service_status' => 'required',
            'service_banner' => 'image|nullable|max:2050',
            'service_slider1' => 'image|nullable|max:2050',
            'service_slider2' => 'image|nullable|max:2050',
            'slider_sm_1' => 'image|nullable|max:2050',
            'slider_sm_2' => 'image|nullable|max:2050'
        ]);

        if ($request->hasFile('service_banner')){
            $fileNameWithExt = $request->file('service_banner')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('service_banner')->getClientOriginalExtension();
            $fileNameBanner = $fileName . $fileExt;
            $path = $request->file('service_banner')->storeAs('public/service_banners', $fileNameBanner);

        }else{
            $fileNameBanner = 'default-banner.jpg';
        }

        if ($request->hasFile('service_slider1')){
            $fileNameWithExt = $request->file('service_slider1')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('service_slider1')->getClientOriginalExtension();
            $service_slider1 = $fileName . $fileExt;
            $path = $request->file('service_slider1')->storeAs('public/service_slider', $service_slider1);

        }else{
            $service_slider1 = 'default-service_slider1.jpg';
        }
        if ($request->hasFile('service_slider2')){
            $fileNameWithExt = $request->file('service_slider2')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('service_slider2')->getClientOriginalExtension();
            $service_slider2 = $fileName . $fileExt;
            $path = $request->file('service_slider2')->storeAs('public/service_slider', $service_slider2);

        }else{
            $service_slider2 = 'default-service_slider2.jpg';
        }

        if ($request->hasFile('slider_sm_1')){
            $fileNameWithExt = $request->file('slider_sm_1')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('slider_sm_1')->getClientOriginalExtension();
            $slider_sm_1 = $fileName . $fileExt;
            $path = $request->file('slider_sm_1')->storeAs('public/service_slider', $slider_sm_1);

        }else{
            $slider_sm_1 = 'default-banner.jpg';
        }
        if ($request->hasFile('slider_sm_2')){
            $fileNameWithExt = $request->file('slider_sm_2')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('slider_sm_2')->getClientOriginalExtension();
            $slider_sm_2 = $fileName . $fileExt;
            $path = $request->file('slider_sm_2')->storeAs('public/service_slider', $slider_sm_2);

        }else{
            $slider_sm_2 = 'default-banner.jpg';
        }

        $service = Service::find($id);

        $service->service_name      =   $request->input('service_name');
        $service->service_status    =   $request->input('service_status');
        $service->service_slider1   =   $service_slider1;
        $service->service_slider2   =   $service_slider2;
        $service->service_banner    =   $fileNameBanner;
        $service->slider_sm_1       =   $slider_sm_1;
        $service->slider_sm_2       =   $slider_sm_2;
        $service->service_slug      = Str::slug($request->service_name, '-');
        $service->save();

        return redirect('services')->with('status', 'Service Created Successfully!');
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
