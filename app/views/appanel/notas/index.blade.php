@extends('appanel/template')
@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Notas</span>
	</nav>

	<!-- Destacados -->
	<div class="row">
		<div class="col s12">
			<div class="destacados card-panel grey lighten-3 valign-wrapper">
				<h5 class="valign grey-text text-lighten-1">Arrastra aquí tu contenido destacado</h5>
			</div>
		</div>
	</div>

	<!-- Listado -->
	<div class="row">
	@foreach ($notas as $nota)
		<div class="col s4" id="item-{{$nota->id}}">
			<div class="card small">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="{{URL::asset('pictures/sq/'.$nota->img->url)}}">
					<span class="card-title">{{$nota->title}}</span>
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">{{$nota->categoria->name}} <i class="mdi-navigation-more-vert right"></i></span>
					<p>{{$nota->description}}</p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Opciones <i class="mdi-navigation-close right"></i></span>
					<ul class="collection">
						<li class="collection-item"><a href="nota/{{$nota->id}}/edit"><i class="mdi-content-create"></i> Editar</a></li>
						<li class="collection-item"><a href="nota/{{$nota->id}}/edit"><i class="mdi-action-delete"></i> Borrar</a></li>
					</ul>
				</div>
			</div>
		</div>
	@endforeach
	</div>

	<!-- Floating button -->
	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		<a href="nota/create" class="btn-floating btn-large red">
			<i class="large mdi-content-create"></i>
		</a>
	</div>

	<!-- Footer -->
	<footer id="footer" class="page-footer blue-grey darken-2">
		<div class="row">
			<div class="col l6 s12">
				{{$notas->links()}}
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
