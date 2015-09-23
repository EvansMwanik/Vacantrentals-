@extends('layouts.main')
@section('content')

@include('errors._error')

<div id="admin">

		<h1>Rentaltype Admin Panel</h1><hr>

		<h3>Here you can view Rentaltypes.</h3>

		<h2>Listed Rentaltypes</h2><hr>

		<ul>
			@foreach($rentaltypes as $rentaltype)
				<li>
					{!! $rentaltype->title !!}
					{!! Form::open(array('url'=>'Admin/rentaltypes/id/delete', 'method' => 'delete','class'=>'form-inline')) !!}
					{!! Form::hidden('id', $rentaltype->id) !!}
					{!! Form::submit('Delete') !!}
					{!! Form::close() !!} - 
                    <a href="/Admin/rentaltypes/edit/{!! $rentaltype->id !!}"><input type="button" value="Edit" class="edit" /></a>
				</li>
			@endforeach
		</ul>
<p>Add new Rentaltype</p><a href="/Admin/rentaltypes/create"><input type="button" value="Create Rentatlype" class="secondary-cart-btn" /></a>
	
</div><!-- end admin -->

@stop
