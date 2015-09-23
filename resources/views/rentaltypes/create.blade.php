@extends('layouts.main')

@section('content')

	<div id="admin">

		<h1>Rentaltype Admin Panel</h1><hr>

		<p>Here you can create new Rentaltypes.</p>
@include('errors._error')
		{!! Form::open(array('url'=>'Admin/rentaltypes/store', 'class'=>'form-inline')) !!}
		
		<p>
			{!! Form::label('title') !!}
			{!! Form::text('title') !!}
		
		{!! Form::submit('Add Rentaltype', array('class'=>'secondary-cart-btn')) !!}
		{!! Form::close() !!}
	</div><!-- end admin -->

@stop
