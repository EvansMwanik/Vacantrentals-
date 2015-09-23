<?php

namespace vacantrentals\Http\Controllers;

use Illuminate\Http\Request;

use vacantrentals\Http\Requests;
use vacantrentals\Http\Controllers\Controller;
use vacantrentals\Http\Requests\rentaltypeRequest;
use vacantrentals\Rentaltype;
use Illuminate\Support\Facades\Input;

class RentaltypesController extends Controller
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
        $rentaltype =Rentaltype::all();
        return view('rentaltypes.index')->with('rentaltypes',$rentaltype);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
         $rentaltype =Rentaltype::all();
        return view('rentaltypes.create')->with('rentaltypes',$rentaltype);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(rentaltypeRequest $request)
    {
        $input=Input::all();
        $rentaltype=new Rentaltype(array('title'=>$request->get('title')));
        $rentaltype->save();
        return redirect('Admin/rentaltypes')->with('message','Rentaltype created successfully');
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
        $rentaltype=Rentaltype::FindOrFail($id);
        return view ('rentaltypes.edit')->with('rentaltype', $rentaltype);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(rentaltypeRequest $request,Rentaltype $id)
    {
        $rentaltype=Rentaltype::find(Input::get('id'));
        $rentaltype->update(['title'=>$request->get('title')]);
        return redirect('Admin/rentaltypes')->with('message','Rentaltype updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $rentaltype=Rentaltype::find(Input::get('id'));
        if($rentaltype){
            $rentaltype->delete();
            return redirect('Admin/rentaltypes')->with('message','Rentaltype deleted successfully');
        }
    }
}
