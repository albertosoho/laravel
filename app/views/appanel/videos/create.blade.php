@extends('appanel/template')
@section('content')
{{ Form::open(array('url'=>'appanel/video')) }}
	<div class="form-group">
	<label>Título</label>
		<input type="text" name="title" value="" placeholder="Título" class="form-control">
	</div>
	<div class="form-group">
	<label>Subtitulo</label>
		<input type="text" name="subtitle" value="" placeholder="Subtítulo" class="form-control">
	</div>
	<div class="form-group">
	<label>Créditos</label>
		<textarea name="credits" placeholder="Créditos" class="form-control"></textarea>
	</div>
	<div class="form-group">
	<label>Tags</label>
		<input type="text" name="tags" value="" placeholder="Tags" class="form-control">
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
		<input type="text" name="youtube" placeholder="ID youtube" class="form-control">
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