@extends('layouts.main')
@section('content')

@include('errors._error')

<div id="contact-us">

		<h2>Vacantrentals.com</h2><hr>

		<p>This site is dedicated to enable you locate rentals without the hustle of moving from one Estate to another,<br>
		you can also locate vacant Office space, feel free to submit your feedback and queries below:</p> 
		
		 {!!Form::open(array('url'=>'store/email', 'class'=>'form'))!!}
		<div class="form-group">
		{!!Form::label('Your Name:')!!}
		{!!Form::text('name',null,array('required','class'=>'form-control','placeholder'=>'Your name'))!!}
		</div><br>
		<div class="form-group">
		{!!Form::label('Your Email:')!!}
		{!!Form::text('email',null,array('required','class'=>'form-control','placeholder'=>'Your Email address'))!!}
		</div><br>
		<div class="form-group">
		{!!Form::label('Your message:')!!}
		{!!Form::textarea('message',null,array('required','class'=>'form-control','placeholder'=>'Your Message'))!!}
		</div>
		<div class="form-group">
		{!!Form::submit('contact us!')!!}
		{!!Form::close()!!}
		</div>
	</div>
	@stop
