@extends('laravel-app-boilerplate::layout')

@section('content')

	<div id="signup">
		<h1>Sign Up</h1>
		{{ Form::open(array('url' => 'signup')) }}
			{{ Form::label('name', 'Name') }}
			{{ $errors->first('name') ? '<span class="error">'. $errors->first('name') .'</span>' : '' }}<br>
			{{ Form::text('name', Input::old('name')) }}
			{{ Form::label('email', 'Email Address') }}
			{{ $errors->first('email') ? '<span class="error">'. $errors->first('email') .'</span>' : '' }}<br>
			{{ Form::text('email', Input::old('email')) }}
			{{ Form::label('password', 'Password') }}
			{{ $errors->first('password') ? '<span class="error">'. $errors->first('password') .'</span>' : '' }}<br>
			{{ Form::password('password') }}
			{{ Form::label('password_confirmation', 'Confirm Password') }}
			{{ $errors->first('password_confirmation') ? '<span class="error">'. $errors->first('password_confirmation') .'</span>' : '' }}<br>
			{{ Form::password('password_confirmation') }}<br>
			{{ Form::submit('Sign Up', array('class' => 'btn')) }}
		{{ Form::close() }}
	</div>

@stop
