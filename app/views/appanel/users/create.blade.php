@extends('appanel/template')
@section('content')
{{ Form::open(array('url'=>'appanel/nota')) }}
 	<div class="form-group">
		<input type="text" name="title" value="" placeholder="Título" class="form-control">
	</div>
	<div class="form-group">
		<textarea name="content" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>Categoría</label>
		<select name="category" class="form-control">
			@foreach($categories as $c)
			<option value="{{$c->id}}">{{$c->name}}</option>
			@endforeach
		</select>
	</div>
	<input type="submit" name="" value="Enviar">
{{Form::close()}}
@stop