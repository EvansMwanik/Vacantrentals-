@extends('layouts.main')
@section('content')

@include('errors._error')
@section('promo')

	<section id="promo">
        <div id="promo-details">
            <h1>New Deals</h1>
            <p>Checkout this section for latest houses.</p>
        </div><!-- end promo-details -->
        {!! Html::image('img/promo.jpg', 'Promotional Ad') !!}
    </section><!-- promo -->

@stop

<div id="rental">

		<h2>Listed Estates and Rentals</h2><hr>

		<u>
			@foreach($rentals as $rental)
			
				<li>
				{!!($estates)!!}
					<br>
					<a href="rentals/view">{!!$rental->title!!}</a>-{!!$rental->image!!}
					
					{!! Form::close() !!} 
                    
				</li>
				@if(Auth::check())
				<p>
                {!! Form::open(array('url'=>'store/book')) !!}
                {!! Form::hidden('id', $rental->id) !!}
                <button type="submit" class="cart-btn">
                    <span class="price">Ksh.{!! $rental->price !!}/Month</span> BOOK NOW
                </button>
                {!! Form::close() !!}
                @endif
            </p>
			
			@endforeach
		</ul>
		<br>
		<!--if the user is not logged in, link to login-->
		@if(!Auth::check())

<h5>You can login or create an account here</h5><a href="/Auth/login"><input type="button" value="Login or Create Account" class="secondary-cart-btn" /></a>
	
	@endif
</div><!-- end rental -->

@stop


