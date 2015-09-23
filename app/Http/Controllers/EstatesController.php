<?php

namespace vacantrentals\Http\Controllers;

use Illuminate\Http\Request;
use vacantrentals\Http\Controllers\Controller;

use vacantrentals\Http\Requests;
use vacantrentals\Http\Requests\estatesRequest;
use vacantrentals\Estate;
use Illuminate\Support\Facades\Input;

class EstatesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $estate=Estate::all();
        return view('estates.index')->with('estates',$estate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
         $estate=Estate::all();
        return view('estates.create')->with('estates',$estate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(estatesRequest $request)
    {
        $input=Input::all();
        $estate= new Estate(array('title'=>$request->get('title')));
        $estate->save();
        return redirect('Admin/estates')->with('message','Estate created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $estate=Estate::FindOrFail($id);
        return view ('estates.edit')->with('estate', $estate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(estatesRequest $request,Estate $id)
    {
        $estate=Estate::find(Input::get('id'));
        $estate->update(['title' => $request->get('title')]);
        return redirect('Admin/estates')->with('message','Estate updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $estate=Estate::find(Input::get('id'));
       if($estate){
        $estate->delete();
         return redirect('Admin/estates')->with('message','Estate deleted successfully');
       }
        return redirect('Admin/estates')->with('message','Estate not deleted successfully');
    }
}
