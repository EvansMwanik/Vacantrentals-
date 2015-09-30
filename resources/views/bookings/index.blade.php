@extends('layouts.main')

@section('content')

	<div id="shopping-cart">
    <h1>Booked Houses</h1>
    
    <table border="1">
        <tr>
            <th>Booking ID</th>
            <th>Rental</th>
            <th>Status</th>
            <th>Price</th>
            <th>Booking Date</th>
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
            <td>
                {!! Form::open(array('url'=>'Admin/bookings/cancel', 'class'=>'form-inline')) !!}
                {!! Form::hidden('id', $booking->id) !!}
                {!! Form::submit('cancel') !!}
                {!! Form::close() !!} 
            </td>
        </tr>
        @endforeach
        
    </table>
    
    </div><!-- end shopping-cart -->

@stop
