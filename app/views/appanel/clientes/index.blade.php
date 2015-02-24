@extends('appanel/template')
@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">{{$title}}</span>
	</nav>

	<!-- TABS -->
	<div class="row">
		<div class="col s12">
			<ul class="tabs">
				<li class="tab col s6"><a class="active" href="#test1">Clientes</a></li>
				<li class="tab col s6"><a href="#test2">Espacios</a></li>
			</ul>
		</div>
		<div id="test1" class="col s12">
			<ul class="collection with-header">
				@foreach ($clientes as $cliente)
					<li class="collection-item"><a href="client/{{$cliente->id}}/edit">{{$cliente->name}}</a></li>
				@endforeach
			</ul>
		</div>
		<div id="test2" class="col s12">
			<!-- Anuncios -->
			<div class="row">
			@foreach ($positions as $p)
				<div class="col s12 m3">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">{{$p->position}} .- {{$p->name}}</span>
							<p></p>
						</div>
						<div class="card-action">
							@if($p->status == 1)
							<a href="#">Ocupado Liberar</a>
							@else
							<a href="#">Libre</a>
							@endif
						</div>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div>

	<!-- Floating button -->
	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		<a href="client/create" class="btn-floating btn-large red">
			<i class="large mdi-content-create"></i>
		</a>
	</div>

	<!-- Footer -->
	<footer id="footer" class="page-footer blue-grey darken-2">
		<div class="row">
			<div class="col l6 s12">
				{{$clientes->links()}}
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
