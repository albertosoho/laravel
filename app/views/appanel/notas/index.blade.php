@extends('appanel/template')
@section('content')
<a href="nota/create" class="btn btn-primary">Añadir nueva</a>
@foreach ($notas as $nota)
<li>
	<a href="nota/{{$nota->id}}/edit">{{$nota->title}} - {{$nota->categoria->name}} - {{$nota->status}}</a>
	<a href="">{{$nota->user->name}}</a>
	<a href="nota/{{$nota->id}}/edit">Editar</a>
	{{Form::model($nota, array('route' => array('appanel.nota.destroy', $nota->id), 'class'=>'inline', 'method' => 'DELETE'))}}
		<button type="submit">Borrar</button>
	{{Form::close()}}
</li>
@endforeach
{{$notas->links()}}
@stop
{{--$notas imprime json--}}