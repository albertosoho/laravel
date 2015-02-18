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
			buttons: ['html'],
			minHeight: 50
		});
		$('#content').redactor({
			plugins: ['fullscreen'],
			buttons: ['html', 'bold', 'italic', 'deleted', 'unorderedlist', 'orderedlist', 'outdent', 'indent', 'link', 'alignment', 'horizontalrule'],
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
		<span class="page-title">Editar video</span>
	</nav>

	<div class="container">
	{{Form::model($video, array('route' => array('appanel.video.update', $video->id), 'method' => 'PUT'))}}
		<div class="row">
			<div class="input-field col s12 big">
				<label>Título</label>
				<input type="text" name="title" value="{{$video->title}}">
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
			</div>
			<div class="input-field col s6">
				<label>Categoría</label>
				<br />

				<select name="category">

					@foreach($categories as $c)
					<option value="{{$c->id}}"
						@if($video->categoria->id == $c->id)
						{{" selected"}}
						@endif
					>{{$c->name}}</option>
					@endforeach

				</select>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<label>Descripción</label>
				<textarea id="description" name="subtitle" placeholder="Subtítulo">{{$video->subtitle}}</textarea>
			</div>
			<div class="input-field col s12">
				<label>Contenido</label>
				<textarea id="content" name="credits" placeholder="Créditos">{{$video->credits}}</textarea>
			</div>
		</div>
		<div class="row">
			<input type="hidden" name="type" value="youtube">
		 	<div class="input-field col s6">
		 		<label>Link de YouTube</label>
				<input type="text" name="youtube" value="http://www.youtube.com/watch?v={{$video->youtube}}">
			</div>
		 	<div class="input-field col s6">
		 		<label>Tags</label>
				<input type="text" name="tags" value="{{$video->tags}}">
			</div>
		</div>

		<div class="row">
		 	<div class="input-field col s6">
			 	<div>
					<input type="checkbox" id="status" name="status" value="1"
						@if($video->status == "1")
						{{" checked"}}
						@endif
					>
			 		<label for="status">Publicada</label>
				</div>
			</div>
		 	<div class="input-field col s6">
				<button class="btn waves-effect waves-light right">Actualizar</button>
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