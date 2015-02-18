@extends('appanel/template')
@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Usuarios</span>
	</nav>

	<div class="container">
		<ul class="collection with-header">
		@foreach($users as $u)
			<li class="collection-item"><a href="user/{{$u->id}}/edit">{{$u->username}}</a></li>
		@endforeach
		</ul>
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