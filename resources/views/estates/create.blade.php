@extends('layouts.main')

@section('content')

	<div id="admin">

		<h1>Estates Admin Panel</h1><hr>

		<p>Here you can create new Estates.</p>
@include('errors._error')
		{!! Form::open(array('url'=>'Admin/estates/store', 'class'=>'form-inline')) !!}
		
		<p>
			{!! Form::label('title') !!}
			{!! Form::text('title') !!}
		
		{!! Form::submit('Add Estate', array('class'=>'secondary-cart-btn')) !!}
		{!! Form::close() !!}
	</div><!-- end admin -->

@stop
