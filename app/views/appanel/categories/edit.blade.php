@extends('appanel/template')
@section('content')
{{Form::model($cat, array('route' => array('appanel.category.update', $cat->id), 'method' => 'PUT'))}}
	<div class="form-group">
		<label>Nombre</label>
		<input type="text" name="name" value="{{$cat->name}}" placeholder="Nombre" class="form-control">
	</div>
	<div class="form-group">
		<label>Tipo</label>
		<select name="objects" class="form-control">
			<option value="nota">Nota</option>
			<option value="video">Video</option>
			<option value="derbez">Derbez</option>
		</select>
	</div>
	<div class="form-group">
		<label>Activa</label>
		<input type="checkbox" checked name="status" value="1">
	</div>
	<input type="submit" name="" value="Enviar">
{{Form::close()}}
@stop