@extends('appanel/template')

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/panel/css/redactor.css')}}">
@stop

@section('scripts')
	<script src="{{URL::asset('/panel/js/fontsize.min.js')}}"></script>
	<script src="{{URL::asset('/panel/js/fullscreen.min.js')}}"></script>
	<script src="{{URL::asset('/panel/js/redactor.min.js')}}"></script>
	<script>
	$(document).ready(function(){
		$('textarea').redactor({
			plugins: ['fullscreen'],
			imageUpload: '{{route('upload')}}',
			minHeight: 400,
		});
	});
	</script>
@stop

@section('content')
{{ Form::open(array('url'=>'appanel/nota')) }}
	<div class="form-group">
		<label>Título</label>
		<input type="text" name="title" value="" placeholder="Título" class="form-control">
	</div>
	<div class="form-group">
		<label>Contenido</label>
		<textarea name="content" placeholder="Contenido" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>Categoría</label>
		<select name="category" class="form-control">
			@foreach($categories as $c)
			<option value="{{$c->id}}">{{$c->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Descripción</label>
		<textarea name="description" class="form-control" placeholder="Descripción"></textarea>
	</div>
 	<div class="form-group">
 		<label>Tags</label>
		<input type="text" name="tags" value="" placeholder="Tags" class="form-control">
	</div>
 	<div class="form-group">
 		<label>Fuente</label>
		<input type="text" name="fuente" value="" placeholder="Fuente" class="form-control">
	</div>
 	<div class="form-group">
 		<label>Publicada</label>
		<input type="checkbox" checked name="status" value="1">
	</div>
	<input type="submit" name="" value="Enviar">
{{Form::close()}}
@stop