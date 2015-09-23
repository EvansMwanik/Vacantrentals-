<?php

namespace vacantrentals\Http\Controllers;

use Illuminate\Http\Request;

use vacantrentals\Http\Requests;
use vacantrentals\Http\Requests\contactRequest;
use vacantrentals\Http\Controllers\Controller;
use vacantrentals\Estate;
use vacantrentals\Rental;
use Illuminate\Support\Facades\Input;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rental=Rental::all();
        $estate=Estate::all();
        return view('store.index')
        ->with('rentals',$rental)
        ->with('estates',$estate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function search()
    {
        $keyword = Input::get('keyword');

        return View('store.search')
            ->with('rentals', Rental::where('title', 'LIKE', '%'.$keyword.'%')->get())
            ->with('keyword', $keyword);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $rental=Rental::all();
        return view('store.show') 
        ->with('rentals', $rental);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function contact()
    {
        return view('store.contact');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function email(contactRequest $request)
    {
        \Mail::send('store.contact',array(
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'user_message'=>$request->get('message')),
        function($message){
            $message->from('compsolutionscentre@gmail.com');
            $message->to('compsolutionscentre@gmail.com','Admin')->subject('vacantrentals feedback');
        });
        return reidrect('store/contact')->with('message','Thanks for contact us!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
