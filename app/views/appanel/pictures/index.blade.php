@extends('appanel/template')
@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Imágenes</span>
	</nav>

	<a href="nota/create" class="btn btn-primary">Añadir nuevo</a>
	@foreach ($pictures as $picture)
	<li>
		<a href="picture/{{$picture->id}}/edit">
			<img src="{{URL::asset('/pictures/sqm/'.$picture->url)}}">
		</a>
		<a href="picture/{{$picture->id}}/edit">Editar</a>
		{{Form::model($picture, array('route' => array('appanel.nota.destroy', $picture->id), 'class'=>'inline', 'method' => 'DELETE'))}}
			<button type="submit">Borrar</button>
		{{Form::close()}}
	</li>
	@endforeach
	{{$pictures->links()}}

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
{{--$notas imprime json--}}
