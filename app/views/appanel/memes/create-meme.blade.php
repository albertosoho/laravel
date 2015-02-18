@extends('appanel/template')
@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Notas</span>
	</nav>

	<div class="container">
		{{ Form::open(array('url'=>'appanel/nota')) }}
			<div class="row">
				<div class="input-field col s12 big">
					<label>Descripción</label>
					<input type="text" name="description" value="">
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<label>File</label>
					<input type="text" name="file" class="form-control">
				</div>
				<div class="input-field col s6">
					<label>Tags</label>
					<input type="text" name="tags" value="" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<div>
						<input type="checkbox" checked id="status" name="status" value="1">
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
@stop