<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $data = array(
            'title'     =>  'Brand',
            'brands'    =>  DB::table('service_brands')
                ->join('services', 'services.service_id', '=', 'service_brands.service_id')
                ->select('service_brands.*', 'services.service_slug')
                ->get()
        );

        return view('brands.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title'     =>  'Add your Brand',
            'services'  =>  Service::all() //DB::table('service_brands')->where('service_id', '=', 1)->get()
        );

        return view('brands.add')->with($data);
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
            'brand_name' => 'required|unique:service_brands|max:255',
            'service_id' => 'required',
            'brand_image' => 'image|nullable|max:2050',
        ]);

        $service_name = DB::table('services')->where('service_id', $request->input('service_id'))->value('service_slug');

        if ($request->hasFile('brand_image')){
            $fileNameWithExt = $request->file('brand_image')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('brand_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . $fileExt;
            $path = $request->file('brand_image')->storeAs("public/{$service_name}_brands", $fileNameToStore);

        }else{
            $fileNameToStore = 'default-image.jpg';
        }

        $brand = new Brand;

        $brand->brand_name = $request->input('brand_name');
        $brand->brand_slug = Str::slug($request->brand_name, '-');
        $brand->brand_image = $fileNameToStore;
        $brand->service_id = $request->input('service_id');
        $brand->save();

        return redirect('brands')->with('status', 'Brand Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service_id = DB::table('service_brands')->where('brand_slug', $id)->value('service_id');

        $data = array(
            'title'     =>  DB::table('service_brands')->where('brand_slug', $id)->value('brand_name')
        );

        return view('brands.view')->with($data);
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
