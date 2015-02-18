@extends('appanel/template')
@section('content')
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