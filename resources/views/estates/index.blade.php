@extends('layouts.main')
@section('content')

@include('errors._error')

<div id="admin">

		<h1>Estates Admin Panel</h1><hr>

		<h3>Here you can view Estates.</h3>

		<h2>Listed Estates</h2><hr>

		<ul>
			@foreach($estates as $estate)
				<li>
					{!! $estate->title !!}
					{!! Form::open(array('url'=>'Admin/estates/id/delete', 'method' => 'delete','class'=>'form-inline')) !!}
					{!! Form::hidden('id', $estate->id) !!}
					{!! Form::submit('Delete') !!}
					{!! Form::close() !!} - 
                    <a href="/Admin/estates/edit/{!! $estate->id !!}"><input type="button" value="Edit" class="edit" /></a>
				</li>
			@endforeach
		</ul>
<p>Add new Estate</p><a href="/Admin/estates/create"><input type="button" value="Create Estate" class="create" /></a>
	</div><!-- end admin -->

@stop
