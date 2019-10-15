<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Segment;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SegmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     =>  'Segment',
            'segments'  =>  DB::table('service_segments')->get() //DB::table('service_brands')->where('service_id', '=', 1)->get()
        );

        return view('segments.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title'     =>  'Add your Segment',
            'services'  =>  Service::all(),
            'brands'    =>  Brand::all(),
        );

        return view('segments.add')->with($data);
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
            'segment_name' => 'required|unique:service_segments|max:255',
            'service_id' => 'required',
            'segment_image' => 'image|nullable|max:2050',
        ]);

        $service_name = DB::table('services')->where('service_id', $request->input('service_id'))->value('service_slug');

        if ($request->hasFile('segment_image')){
            $fileNameWithExt = $request->file('segment_image')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('segment_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . $fileExt;
            $path = $request->file('segment_image')->storeAs("public/segments", $fileNameToStore);

        }else{
            $fileNameToStore = 'default-image.jpg';
        }

        $segment = new Segment;

        $segment->segment_name = $request->input('segment_name');
        $segment->segment_slug = Str::slug($request->segment_name, '-');
        $segment->segment_image = $fileNameToStore;
        $segment->service_id = $request->input('service_id');
        $segment->save();

        return redirect('segments')->with('status', 'Brand Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $segment_id    =   DB::table('service_segments')->where('segment_slug', $id)->value('category_id');
        $type_id        =   DB::table('service_segments')->where('segment_slug', $id)->value('type_id');

        $data = array(
            'title'     =>  DB::table('service_segments')->where('segment_slug', $id)->value('segment_name'),
            'brands'    =>  DB::table('service_items')
                ->where('category_id', $segment_id)
                ->where('type_id', $type_id)
                ->join('service_brands', 'service_brands.brand_id', '=', 'service_items.brand_id')
                ->get(),
            'items'     =>  DB::table('service_items')->where('category_id', $segment_id)->where('type_id', $type_id)->get()
        );
        return $id;

        return view('segments.view')->with($data);
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
