@extends('layouts.main')

@section('content')

	<div id="admin">

		<h1>Rentaltype Admin Panel</h1><hr>

		<p>Here you can edit selected Rentaltype.</p>

		<h2>Edit Rentaltype</h2><hr>

		@include('errors._error')

		{!! Form::model($rentaltype, array('method' => 'put', 'url' => 'Admin/rentaltypes/update', 'class' => 'form')) !!}
		
		<p>
			{!! Form::label('title') !!}
			{!! Form::text('title', $rentaltype->title) !!}
		</p>
		{!! Form::hidden('id', $rentaltype->id) !!}
		{!! Form::submit('Edit Rentaltype', array('class'=>'secondary-cart-btn')) !!}
		{!! Form::close() !!}
	</div><!-- end admin -->

@stop
