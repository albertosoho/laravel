@extends('appanel/template')
@section('content')
{{Form::model($nota, array('route' => array('appanel.nota.update', $nota->id), 'method' => 'PUT'))}}
	<div class="form-group">
		<label>Título</label>
		<input type="text" name="title" value="{{$nota->title}}" placeholder="Título" class="form-control">
	</div>
	<div class="form-group">
		<label>Contenido</label>
		<textarea name="content" placeholder="Contenido" class="form-control">{{$nota->content}}</textarea>
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
		<textarea name="description" class="form-control" placeholder="Descripción">{{$nota->description}}</textarea>
	</div>
 	<div class="form-group">
 		<label>Tags</label>
		<input type="text" name="tags" value="{{$nota->tags}}" placeholder="Tags" class="form-control">
	</div>
 	<div class="form-group">
 		<label>Fuente</label>
		<input type="text" name="fuente" value="{{$nota->fuente}}" placeholder="Fuente" class="form-control">
	</div>
 	<div class="form-group">
 		<label>Publicada</label>
		<input type="checkbox" checked name="status" value="1">
	</div>
	<input type="submit" name="" value="Enviar">
{{Form::close()}}
@stop