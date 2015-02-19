@extends('appanel/template')

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/panel/css/redactor.css')}}">
@stop

@section('scripts')
	<script src="{{URL::asset('/panel/js/fontsize.min.js')}}"></script>
	<script src="{{URL::asset('/panel/js/fullscreen.min.js')}}"></script>
	<script src="{{URL::asset('/panel/js/redactor.min.js')}}"></script>
	<script src="{{URL::asset('/panel/js/dnn.upload.js')}}"></script>
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
			minHeight: 150,
			imageUpload: '{{route('upload')}}',
			imageGetJson: '{{route('picsJSON')}}',
			clipboardUploadUrl: '{{route('picsJSON')}}'
		});
	});
	</script>
@stop

@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Editar nota</span>
	</nav>
	<input type="file" id="file" class="hidden" />

	<div class="container">
	{{Form::model($nota, array('route' => array('appanel.nota.update', $nota->id), 'method' => 'PUT'))}}
		<div class="row">
			<div class="input-field col s12 big">
				<label>Título</label>
				<input type="text" name="title" value="{{$nota->title}}">
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<div id="droppeable" class="card-panel grey lighten-5 z-depth-1 upload">
					<input type="hidden" name="cover" value="" />
					<div class="response">
						<div class="progress">
							<div id="uploadStatus" class="determinate" style="width: 70%"></div>
						</div>
					</div>
					<div class="options">
						<button class="openLocal btn col s5">Selecciona</button>
						<div class="col s2 center-align">
							<span>ó</span>
						</div>
						<button class="openFile btn col s5">Sube</button>
					</div>
				</div>
			</div>
			<div class="input-field col s6">
				<label>Categoría</label>
				<br />

				<select name="category">

					@foreach($categories as $c)
					<option value="{{$c->id}}"
						@if($nota->categoria->id == $c->id)
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
				<textarea id="description" name="description" placeholder="Descripción">{{$nota->description}}</textarea>
			</div>
			<div class="input-field col s12">
				<label>Contenido</label>
				<textarea id="content" name="content" placeholder="Contenido">{{$nota->content}}</textarea>
			</div>
		</div>
		<div class="row">
		 	<div class="input-field col s6">
		 		<label>Fuente</label>
				<input type="text" name="fuente" value="{{$nota->fuente}}">
			</div>
		 	<div class="input-field col s6">
		 		<label>Tags</label>
				<input type="text" name="tags" value="{{$nota->tags}}">
			</div>
		</div>
		<div class="row">
		 	<div class="input-field col s6">
			 	<div>
					<input type="checkbox" id="status" name="status" value="1"
						@if($nota->status == "1")
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