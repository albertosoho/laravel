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
		$('#description').redactor({
			plugins: ['fullscreen'],
			buttons: ['bold', 'italic', 'deleted'],
			minHeight: 50
		});
		$('#content').redactor({
			plugins: ['fontsize','fullscreen'],
			convertVideoLinks: true,
			convertLinks: true,
			toolbarFixedBox: true,
			minHeight: 150
		});
	});
	</script>
@stop

@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Nueva nota</span>
	</nav>

	<div class="container">
	{{ Form::open(array('url'=>'appanel/nota')) }}
		<div class="row">
			<div class="input-field col s12 big">
				<label>Título</label>
				<input type="text" name="title" value="" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
			</div>
			<div class="input-field col s6">
				<label>Categoría</label>
				<br />

				<select name="category">

					<option value="" disabled selected>Elige una cateogría</option>
					@foreach($categories as $c)
					<option value="{{$c->id}}">{{$c->name}}</option>
					@endforeach

				</select>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<label>Descripción</label>
				<textarea id="description" name="description" class="form-control" placeholder="Descripción"></textarea>
			</div>
			<div class="input-field col s12">
				<label>Contenido</label>
				<textarea id="content" name="content" class="form-control" placeholder="Contenido"></textarea>
			</div>
		</div>
		<div class="row">
		 	<div class="input-field col s6">
		 		<label>Fuente</label>
				<input type="text" name="fuente" value="">
			</div>
		 	<div class="input-field col s6">
		 		<label>Tags</label>
				<input type="text" name="tags" value="">
			</div>
		</div>
		<div class="row">
		 	<div class="input-field col s6">
			 	<div>
					<input type="checkbox" id="status" name="status" value="1" checked>
			 		<label for="status">Publicada</label>
				</div>
			</div>
		 	<div class="input-field col s6">
				<button class="btn waves-effect waves-light right">Publicar</button>
				<button class="btn-flat waves-effect waves-light right">Borrador</button>
			</div>
		</div>
	{{Form::close()}}
	</div>

	<!-- Footer -->
	<footer id="footer" class="page-footer blue-grey darken-2">
		<div class="row">
			<div class="col l6 s12">
			</div>
		</div>
		<div class="footer-copyright">
			<div class="row">
				<div class="col s12">
					<span>© 2015 AMB Multimedia</span>
				</div>
			</div>
		</div>
	</footer>

</main>
<script>
	$(document).ready(function() {
		$('select').material_select();
	});
</script>
@stop