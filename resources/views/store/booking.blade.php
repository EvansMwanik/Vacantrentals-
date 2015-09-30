@extends('layouts.main')

@section('content')

	<div id="booking">
        <h2>Confirm Booking</h1>

@include('errors._error')

        <div class="product">            
            {!!Html::image($rental->image, $rental->title, array('class'=>'feature', 'width'=>'220', 'height'=>'128')) !!}

            <h3>{!! $rental->title !!}</h3>

            <p>{!! $rental->description !!}</p>

            Available
                {!!$rental->available !!}
                    
        </div>

        {!! Form::open(array('url'=>'Admin/bookings/create','method'=>'POST','role'=>'form')) !!}
        {!! Form::hidden('rental_id', $rental->id) !!}
        {!! Form::hidden('user_id', \Auth::user()->id) !!}
        <p>
        {!!Form::label('status', 'Boking Satatus') !!}<br>
        {!! Form::select('$rental->availability' )!!}<br>
        </p>
        {!! Form::submit('Confirm', array('class'=>'secondary-cart-btn')) !!}
        <a href="/"><input type="button" value="Cancel" class="tertiary-btn" /></a>
        {!! Form::close() !!}

    </div><!-- end booking -->

@stop
