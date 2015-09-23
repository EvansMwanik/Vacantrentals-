@extends('layouts.main')

@section('content')

	<div id="admin">

		<h1>Estates Admin Panel</h1><hr>

		<p>Here you can edit selected Estate.</p>

		<h2>Edit Estate</h2><hr>

		@include('errors._error')

		{!! Form::model($estate, array('method' => 'put', 'url' => 'Admin/estates/update', 'class' => 'form')) !!}
		
		<p>
			{!! Form::label('title') !!}
			{!! Form::text('title', $estate->title) !!}
		</p>
		{!! Form::hidden('id', $estate->id) !!}
		{!! Form::submit('Edit Estate', array('class'=>'secondary-cart-btn')) !!}
		{!! Form::close() !!}
	</div><!-- end admin -->

@stop
