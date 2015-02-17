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
		$('textarea').redactor();
	});
	</script>
@stop

@section('content')
{{Form::model($video, array('route' => array('appanel.video.update', $video->id), 'method' => 'PUT'))}}
	<div class="form-group">
	<label>Título</label>
		<input type="text" name="title" value="{{$video->title}}" placeholder="Título" class="form-control">
	</div>
	<div class="form-group">
	<label>Subtitulo</label>
		<input type="text" name="subtitle" value="{{$video->subtitle}}" placeholder="Subtítulo" class="form-control">
	</div>
	<div class="form-group">
	<label>Créditos</label>
		<textarea name="credits" placeholder="Créditos" class="form-control">{{$video->credits}}</textarea>
	</div>
	<div class="form-group">
	<label>Tags</label>
		<input type="text" name="tags" value="{{$video->tags}}" placeholder="Tags" class="form-control">
	</div>
	<div class="form-group">
	<label>Tipo</label>
		<select name="type" class="form-control">
			<option value="youtube">Youtube</option>
			<option value="derbez">Derbez</option>
		</select>
	</div>
	<div class="form-group">
		<label>Publicado</label>
		<input type="checkbox" checked name="status" value="1">
	</div>
	<div class="form-group">
	<label>ID Youtube</label>
		<input type="text" name="youtube" value="{{$video->youtube}}" placeholder="ID Youtube" class="form-control">
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