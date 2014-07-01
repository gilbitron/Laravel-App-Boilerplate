@extends('laravel-app-boilerplate::layout')

@section('content')

	<div id="login">
		<h1>Login</h1>
		{{ Form::open(array('url' => 'login')) }}
			{{ Form::label('email', 'Email Address') }}
			{{ $errors->first('email') ? '<span class="error">'. $errors->first('email') .'</span>' : '' }}<br>
			{{ Form::text('email', Input::old('email')) }}
			{{ Form::label('password', 'Password') }}
			{{ $errors->first('password') ? '<span class="error">'. $errors->first('password') .'</span>' : '' }}<br>
			{{ Form::password('password') }}
			{{ Form::submit('Login', array('class' => 'btn')) }}
		{{ Form::close() }}
	</div>

@stop
