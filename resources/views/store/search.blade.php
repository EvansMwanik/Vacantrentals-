@extends('layouts.main')

@section('search-keyword')

	<hr>
	<section id="search-keyword">
        <h1>Search Results for <span>{{ $keyword }}</span></h1>
    </section><!-- end search-keyword -->

@stop

@if($rentals->(count))
        <p>No rental matches your search</p>

        @endif

@section('content')

	<div id="search-results">

     

		@foreach($rentals as $rental)
        <div class="rental">
            
            {!! Html::image($rental->image, $rental->title, array('class'=>'feature', 'width'=>'220', 'height'=>'128')) !!}

            <h3>{!!Html::link('rentals/view', $rental->title)!!}</h3>
               
              
        </div>
        @endforeach

        
	</div><!-- end search-results -->

@stop
