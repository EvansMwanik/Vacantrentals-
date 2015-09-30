@extends('layouts.main')

@section('content')

	<div id="manage-bookings">
    <h1>Manage Bookings</h1>
    
    <table border="1">
        <tr>
            <th>Booking ID</th>
            <th>Rental</th>
            <th>Status</th>
            <th>Price</th>
            <th>Booking Date</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        @foreach($bookings as $booking)
        <tr>
            <td>{!! $booking->id !!}</td>
            <td>
                {!! Html::image($booking->rental->image, $booking->rental->name, array('width'=>'65', 'height'=>'37'))!!} 
                {!! $booking->rental->title !!}
            </td>
            <td>{!! $booking->status !!}</td>
            <td>Ksh.{!! $booking->rental->price !!}/Month</td>
            <td>{!! date('d/m/Y', strtotime($booking->created_at)) !!}</td>
            <td>{!! $booking->user->firstname !!}</td>
            <td>{!! $booking->user->lastname !!}</td>
            <td>{!! $booking->user->email !!}</td>
            <td>
                {!! Form::open(array('url'=>'bookings/manage', 'class'=>'form-inline'))!!}
                {!! Form::hidden('id', $booking->id) !!}
                {!! Form::select('status', array('Pending'=>'Pending', 'Cancelled'=>'Cancelled', 'Confirmed'=>'Confirmed'), $booking->status) !!}<br>
                {!! Form::submit('Update') !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        
    </table>
    
    </div><!-- end shopping-cart -->

@stop

