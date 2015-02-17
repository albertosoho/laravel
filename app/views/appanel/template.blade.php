<!doctype html>
<html>
<head>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<script src="{{URL::asset('/panel/materialize/js/materialize.min.js')}}"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.8.1/mustache.min.js"></script>
	<script src="{{URL::asset('/panel/js/persist.js')}}"></script>
	@section('scripts')

	@show

	<script src="{{URL::asset('/panel/js/index.js')}}"></script>

	<link rel="stylesheet" href="{{URL::asset('/panel/materialize/css/materialize.min.css')}}">
	@section('styles')

	@show

	<link rel="stylesheet" href="{{URL::asset('/panel/css/style.css')}}">
	<title>{{$title}} | Dashboard</title>
</head>
<body>
	@section('sidebar')
		<header>
			<ul class="side-nav fixed">
			<li class="bold"><a href="/" class="waves-effect waves-teal">Inicio</a></li>
			<li class="bold"><a href="{{route('appanel.nota.index')}}" class="waves-effect waves-teal">Notas</a></li>
			<li class="bold"><a href="{{route('appanel.video.index')}}" class="waves-effect waves-teal">Videos</a></li>
			<li class="bold"><a href="{{route('appanel.meme.index')}}" class="waves-effect waves-teal">Memes</a></li>
			<li class="bold"><a href="{{route('appanel.picture.index')}}" class="waves-effect waves-teal">Imágenes</a></li>
			<li class="bold"><a href="{{route('appanel.category.index')}}" class="waves-effect waves-teal">Categorías</a></li>
			<li class="bold"><a href="{{route('appanel.user.index')}}" class="waves-effect waves-teal">Usuarios</a></li>
			<li class="bold"><a href="{{route('logout')}}" class="waves-effect waves-teal">Salir</a></li>
			</ul>
		</header>
	@show

	@section('content')
	@show
</body>
</html>





