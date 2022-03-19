<?php

namespace App\Http\Controllers;

use App\admin;
use App\Http\Requests\offerRequest;
use App\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\traits\media;

class AdminServiceController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers=service::all();
        return view('admin.offer',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createOffer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(offerRequest $request)
    {
        //
        // $input=$request->all();
        // service::create($input);

        $imageName = $this->uploadMedia($request->image, 'offer');
        $request = $request->except('_token', 'image', 'page');
        $request['image'] = $imageName;
        DB::table('services')->insert($request);
        return redirect()->route('offers.index')->with('success',  'تم انشاء العرض بنجاح  ');
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
        $offer=service::find($id);
        return view('admin.editOffer',compact('offer'));


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



        $result = $request->except( 'image', '_token','_method');
        if ($request->has('image')) {
            $oldImage = DB::table('services')->select('image')->where('id', $id)->first()->image;
            $this->deleteMedia($oldImage, 'offer');
            $imageName = $this->uploadMedia($request->image, 'offer');
            $result['image'] = $imageName;
        }



        DB::table('services')->where('id', $id)->update($result);
        return redirect()->route('offers.index');
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
        // $deleted = Flight::where('active', 0)->delete();

        service::destroy($id);
        return redirect()->route('offers.index')->with('success',  'تم مسح العرض بنجاح  ');

    }
}
