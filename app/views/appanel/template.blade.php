<!doctype html>
<html>
<head>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
	@section('scripts')

	@show
	<script src="{{URL::asset('/panel/js/index.js')}}"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
	@section('styles')

	@show
	<link rel="stylesheet" href="{{URL::asset('/panel/css/style.css')}}">
	<style>
		button{
			background:none;
			border:0;
		}
		.inline{
			display:inline-block;
			color:#337AB7;
		}	
	</style>
	<title>{{$title}}</title>
</head>
<body>
	@section('sidebar')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul>
					<li>
						<a href="{{route('appanel.nota.index')}}">Notas</a>
					</li>
					<li>
						<a href="{{route('appanel.video.index')}}">Videos</a>
					</li>
					<li>
						<a href="{{route('appanel.meme.index')}}">Memes</a>
					</li>
					<li>
						<a href="{{route('appanel.picture.index')}}">Imágenes</a>
					</li>
					<li>
						<a href="{{route('appanel.category.index')}}">Categorías</a>
					</li>
					<li>
						<a href="{{route('appanel.user.index')}}">Usuarios</a>
					</li>
					<li>
						<a href="{{route('logout')}}">Salir</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	@show
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@section('content')
				@show
			</div>
		</div>
	</div>
</body>
</html>