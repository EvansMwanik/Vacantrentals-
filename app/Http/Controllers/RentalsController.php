<?php

namespace vacantrentals\Http\Controllers;

use Illuminate\Http\Request;

use vacantrentals\Http\Requests;
use vacantrentals\Http\Controllers\Controller;
use vacantrentals\Http\Requests\rentalRequest;
use vacantrentals\Estate;
use vacantrentals\Rental;
use vacantrentals\Rentaltype;
use Image;
use Illuminate\Support\Facades\Input;

class RentalsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Estate $estate_id)
    {
        $rental=Rental::all();
        $estate=Estate::with('rental')->get();
        return view('rentals.index')
        ->with('rentals', $rental)
        ->with('estates', $estate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Estate $estate_id)
    {   
        $estate=Estate::all();
        $estate=\DB::table('estates')->lists('title','id');
        $rentaltype=Rentaltype::all();
        $rentaltype=\DB::table('rentaltypes')->lists('title','id');
        
        return view('rentals.create')
        ->with('estate',$estate)
        ->with('rentaltype', $rentaltype);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(rentalRequest $request)
    {
           $rental=new Rental(array(
            'estate_id'=>$request->get('estate_id'),
            'rentaltype_id'=>$request->get('rentaltype_id'),
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'image'=>$request->get('image')));

        $image=Input::file('image');
        $filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
        $path=public_path('img\rentals');
        $image->move($path,$filename);   
        Image::make($image->getRealPath())->resize(468,249)->save($path);
        $rental->image =$path.$filename;
        $rental->save();
        return Redirect('Admin/rentals')->with('message', 'Rental  created Successfully!!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $rental = Rental::find(Input::get('id'));
        return view('rentals.edit')
        ->with('rentals', Rental::with('rentaltype')->get())
        ->with('rentaltype', $rentaltype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $rental = Rental::find(Input::get('id'));

        if ($rental) {
            file::delete('public/'.$rental->image);
            $rental->delete();
            return Redirect('admin/rentals')
                ->with('message', 'Rental  Deleted');
        }

        return Redirect('admin/rentals')
            ->with('message', 'Something went wrong, please try again');
    }
}
