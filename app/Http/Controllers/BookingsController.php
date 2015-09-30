<?php

namespace vacantrentals\Http\Controllers;

use Illuminate\Http\Request;
use vacantrentals\Booking;
use vacantrentals\Rental;
use vacantrentals\Auth;

use vacantrentals\Http\Requests;
use vacantrentals\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BookingsController extends Controller 
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
        return View('bookings.index')
            ->with('bookings', Booking::where('user_id', '=', \Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $booking=Booking::all();
        return view('bookings.manage')->with('bookings',$booking);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {
            $booking = new Booking;
            $booking->rental_id = Input::get('rental_id');
            $booking->user_id = \Auth::user()->id;
            $booking->save();

            return Redirect('Admin/bookings')
                ->with('message', 'Your booking has sent to us. Thank you!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function cancel(Rental $id)
    {
        $booking = Booking::find(Input::get('id'));

        if ($booking) {
            $booking->status = 'Cancelled';
            $booking->save();
            return Redirect('Admin/bookings')
                ->with('message', 'Your Booking Cancelled');
            }

        return back()
            ->with('message', 'Something went wrong, please try again');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        return view('bookings.manage')
            ->with('bookings', Booking::orderBy('created_at', 'DESC')->paginate(10));
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
        $booking = Booking::find(Input::get('id'));

        if ($booking) {
            $booking->status = Input::get('status');
            $booking->save();
            return Redirect('bookings/manage')
                ->with('message', 'Booking Updated');
        }

        return back()
            ->with('message', 'Something went wrong, please try again');
    
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
