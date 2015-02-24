@extends('appanel/template')

@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Editar nota</span>
	</nav>
	<input type="file" id="file" class="hidden" />

	<div class="container">

	<!-- Manejo de errores -->
	@if ($errors->has())
		<?php $dis = '' ?>
		@foreach ($errors->all() as $error)
			<?php $dis .= $error.'</br>' ?>
		@endforeach
		<script>
		$(window).load(function(){
			swal({
				title: 'Verfica lo siguiente',
				html: '{{$dis}}',
				type:'error',
			});
		});
		</script>
	@endif
	<!-- Manejo de errores -->
	
	<!-- Formulario -->
	{{Form::model($cliente, array('route' => array('appanel.client.update', $cliente->id), 'method' => 'PUT'))}}
		<div class="row">
			<div class="input-field col s12 big">
				<label>Nombre</label>
				<input type="text" name="name" value="{{$cliente->name}}">
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<label>Email</label>
				<input type="email" name="email" value="{{$cliente->email}}" >
			</div>
			<div class="input-field col s6">
				<label>Teléfono</label>
				<input type="text" name="phone" value="{{$cliente->phone}}" >
			</div>
			<div class="input-field col s12">
				<label>Compañía</label>
				<input type="text" name="company" value="{{$cliente->company}}" >
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<div>
					@if($errors->has())
						@if(Input::old('status') == 1)
							<input type="checkbox" checked id="status" name="status" value="1">
						@else
							<input type="checkbox" id="status" name="status" value="1">
						@endif
					@else
						<input type="checkbox" checked id="status" name="status" value="1">
					@endif
					<label for="status">Activo</label>
				</div>
			</div>
			<div class="input-field col s6">
				<button class="btn waves-effect waves-light right">Guardar</button>
				<a class="delete" href="{{route('appanel.client.destroy', array('id' => $cliente->id))}}"><i class="mdi-action-delete"></i> Borrar</a>
			</div>
		</div>
	{{Form::close()}}
	<a class="waves-effect waves-light btn" href="{{route('appanel.add.create', array('idCliente' => $cliente->id))}}">Añadir anuncio</a>
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

		$('#status').change(function() {
			var $input = $( this );
			if( $input.prop('checked') == true )
				$('label[for="status"]').html('Activo');
			else
				$('label[for="status"]').html('Inactivo');
		}).change();
	});
</script>
@stop