@extends('appanel/template')
@section('content')
<<<<<<< HEAD
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Imágenes</span>
	</nav>

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
=======
<a href="nota/create" class="btn btn-primary">Añadir nuevo</a>
@foreach ($pictures as $picture)
<li>
	<a href="picture/{{$picture->id}}/edit">
		<img src="{{URL::asset('/pics/sqm/'.$picture->url)}}">
	</a>
	<a href="picture/{{$picture->id}}/edit">Editar</a>
	{{Form::model($picture, array('route' => array('appanel.nota.destroy', $picture->id), 'class'=>'inline', 'method' => 'DELETE'))}}
		<button type="submit">Borrar</button>
	{{Form::close()}}
</li>
@endforeach
{{--$pictures->links()--}}
@stop
{{--$notas imprime json--}}
>>>>>>> f0e9116df68fda11e062f81d41653ecb777b79eb
