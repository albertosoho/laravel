@extends('appanel/template')

@section('scripts')
	<script src="{{URL::asset('/panel/js/dnn.upload.js')}}"></script>
@stop

@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">{{$title}}</span>
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
				type: 'error',
			});
		});
		</script>
	@endif
	<!-- Manejo de errores -->

	<!-- Formulario -->
	{{Form::open(array('url' => route('appanel.add.store')))}}
		<div class="row">
			<div class="input-field col s12 big">
				<label>{{$cliente->name}}</label>
				<input type="hidden" name="cliente_id" value="{{$cliente->id}}">
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<label>Costo</label>
				<input type="text" name="price" value="{{Input::old('price')}}">
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<label>Inicio</label>
				<input type="date" class="datepicker" name="start" value="{{Input::old('start')}}">
			</div>
			<div class="input-field col s6">
				<label>Fin</label>
				<input type="date" class="datepicker" name="duration" value="{{Input::old('duration')}}">
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<ul class="tabs">
					<li class="tab col s2"><a class="active" href="#test1">Home</a></li>
					<li class="tab col s2"><a href="#test2">Videos</a></li>
					<li class="tab col s2"><a href="#test3">Notas</a></li>
					<li class="tab col s2"><a href="#test4">Video</a></li>
					<li class="tab col s2"><a href="#test5">Memeteca</a></li>
				</ul>
			</div>
			<div id="test1" class="col s12 check">
				@foreach($home as $h)
					<div class="col s12 m4">
						<div class="card grey lighten-5">
						<div class="card-content white-text">
							<span class="card-title" style="color:#999">{{$h->name}}</span>
						</div>
							<div class="card-action">
								<p>
									{{Form::checkbox('position[]', $h->position, Input::old('position[]'), array('id'=>'item-'.$h->position))}}
									<label for="item-{{$h->position}}">Activar</label>
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div id="test2" class="col s12 check">
				@foreach($videos as $vs)
					<div class="col s12 m4">
						<div class="card grey lighten-5">
						<div class="card-content white-text">
							<span class="card-title" style="color:#999">{{$vs->name}}</span>
						</div>
							<div class="card-action">
								<p>
									{{Form::checkbox('position[]', $vs->position, Input::old('position[]'), array('id'=>'item-'.$vs->position))}}
									<label for="item-{{$vs->position}}">Activar</label>
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div id="test3" class="col s12 check">
				@foreach($notas as $n)
					<div class="col s12 m4">
						<div class="card grey lighten-5">
						<div class="card-content white-text">
							<span class="card-title" style="color:#999">{{$n->name}}</span>
						</div>
							<div class="card-action">
								<p>
									{{Form::checkbox('position[]', $n->position, Input::old('position[]'), array('id'=>'item-'.$n->position))}}
									<label for="item-{{$n->position}}">Activar</label>
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div id="test4" class="col s12 check">
				@foreach($video as $v)
					<div class="col s12 m4">
						<div class="card grey lighten-5">
						<div class="card-content white-text">
							<span class="card-title" style="color:#999">{{$v->name}}</span>
						</div>
							<div class="card-action">
								<p>
									{{Form::checkbox('position[]', $v->position, Input::old('position[]'), array('id'=>'item-'.$v->position))}}
									<label for="item-{{$v->position}}">Activar</label>
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div id="test5" class="col s12 check">
				@foreach($memeteca as $m)
					<div class="col s12 m4">
						<div class="card grey lighten-5">
						<div class="card-content white-text">
							<span class="card-title" style="color:#999">{{$m->name}}</span>
						</div>
							<div class="card-action">
								<p>
									{{Form::checkbox('position[]', $m->position, Input::old('position[]'), array('id'=>'item-'.$m->position))}}
									<label for="item-{{$m->position}}">Activar</label>
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row">
				<div class="input-field col s12">
					<div id="droppeable" class="card-panel grey lighten-5 z-depth-1 upload">
						<input type="hidden" class="pic" name="pic" value="{{Input::old('pic')}}" />
						<input type="hidden" class="urlcover" name="urlcover" value="{{Input::old('urlcover')}}" />
						<div class="response">
							<div class="progress">
								<div id="uploadStatus" class="determinate" style="width: 70%"></div>
							</div>
						</div>
						<div class="options">
							<button id="ajaxdrop" data-upload="{{route('upload')}}" class="openFile btn col s10 offset-s1">Sube o arrastra una imágen</button>
						</div>
					</div>
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
						<label for="status">Publicada</label>
					</div>
				</div>
				<div class="input-field col s6">
					<button class="btn waves-effect waves-light right">Guardar</button>
				</div>
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

		back = $('.urlcover').val();
		$('#droppeable').css({
			'background-image': "url('" + back + "')"
		});

		$('.check input[type="checkbox"]').change(function(){
			if (this.checked) {
				$('.check input[type="checkbox"]').not(this).attr('checked',false);
			}
		});

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