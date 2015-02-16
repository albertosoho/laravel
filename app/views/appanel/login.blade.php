@extends('appanel/template')
@section('sidebar')
@stop
@section('content')
<div id="error"></div>
{{Form::open(array('url' => 'appanel/dologin', 'id'=>'login'))}}
	<div class="form-group">
		<input class="form-control"name="username" type="text" placeholder="Username">
	</div>
	<div class="form-group">
		<input class="form-control"name="password" type="password" placeholder="Password">
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Entrar">
	</div>
{{Form::close()}}
@stop