@extends('layouts.main')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					
					<section id="signin-form">
        				<h1>I have an account</h1>
        					{!! Form::open(array('url'=>'/Auth/login')) !!}
           					 <p>
               				 {!! Html::image('img/email.gif', 'Email Address') !!}
                			 {!! Form::text('email') !!}
            				</p>
            	<p>
                	{!! Html::image('img/password.gif', 'Password') !!}
                	{!! Form::password('password') !!}
            	</p>

            {!! Form::button('Sign In', array('type'=>'submit', 'class'=>'secondary-cart-btn')) !!}
        	{!! Form::close() !!}
    				
    				</section><!-- end signin-form -->

   			 <section id="signup">
        		<h2>I'm a new here</h2>
        			<h3>You can create an account in just a few simple steps.<br>
           			 Click below to begin.</h3>

        			{!! Html::link('Auth/register', 'CREATE NEW ACCOUNT', array('class'=>'default-btn')) !!}
    		</section><!--- end signup -->
			</div>
		</div>
	</div>
</div>
@endsection
