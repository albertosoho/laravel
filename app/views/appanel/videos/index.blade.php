@extends('appanel/template')
@section('content')
<a href="video/create" class="btn btn-primary">Añadir nuevo</a>
@foreach ($videos as $video)
<li>
	<a href="video/{{$video->id}}/edit">{{$video->title}} -> {{$video->categoria->name}} -> {{$video->status}}</a>
	<a href="">{{$video->user->name}}</a>
	<a href="video/{{$video->id}}/edit">Editar</a>
	{{Form::model($video, array('route' => array('appanel.video.destroy', $video->id), 'class'=>'inline', 'method' => 'DELETE'))}}
		<button type="submit">Borrar</button>
	{{Form::close()}}
</li>
@endforeach
{{$videos->links()}}
@stop
{{--$videos imprime json--}}