@extends('layouts.main')
@section('content')

@include('errors._error')

<div id="rental">

		<h2>Rentals</h2><hr>
@if($rentals->count())
        <p>No rental matches your search</p>

        @endif
		<ul>
			@foreach($rentals as $rental)
				<li>
				{!!$rental->title!!}-
				{!! Html::image($rental->image, $rental->title, array('class'=>'feature', 'width'=>'220', 'height'=>'128')) !!}
					
					{!! Form::close() !!} 
                    
				</li>
			@endforeach
		</ul>
		<br>

	</div><!-- end rental -->

@stop