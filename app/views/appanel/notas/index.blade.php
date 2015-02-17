@extends('appanel/template')
@section('content')

<section class="destacados">
</section>

<a href="nota/create" class="btn btn-primary">Añadir nueva</a>
<ul>
@foreach ($notas as $nota)
	<li class="drag" id="item-{{$nota->id}}">
		<a href="nota/{{$nota->id}}/edit">{{$nota->title}} - {{$nota->categoria->name}} - {{$nota->status}}</a>
		<a href="">{{$nota->user->name}}</a>
		<a class="edit" href="nota/{{$nota->id}}/edit">Editar</a>
		{{Form::model($nota, array('route' => array('appanel.nota.destroy', $nota->id), 'class'=>'inline', 'method' => 'DELETE'))}}
			<button class="delete" type="submit">Borrar</button>
		{{Form::close()}}
		<a class="remove" href="">X</a>
	</li>
@endforeach
</ul>
{{$notas->links()}}
@stop
{{--$notas imprime json--}}