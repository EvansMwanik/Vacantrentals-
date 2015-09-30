@extends('layouts.main')
@section('content')

@include('errors._error')

<div id="rental">

		<h2>Rentals</h2><hr>

		<ul>
			@foreach($rentals as $rental)
				<li>
				{!!$rental->title!!}-
				{!! Html::image($rental->image, $rental->title, array('class'=>'feature', 'width'=>'220', 'height'=>'128')) !!}
				{!!$rental->price!!}
				{!! Form::close() !!} 
                    
				</li><p>
                {!! Form::open(array('url'=>'store/book')) !!}
                {!! Form::hidden('id', $rental->id) !!}
                <button type="submit" class="cart-btn">
                    <span class="price">Ksh.{!! $rental->price !!}/Month</span> BOOK NOW
                </button>
                {!! Form::close() !!}
            </p>
			@endforeach
		</ul>
		<br>

	</div><!-- end rental -->

@stop