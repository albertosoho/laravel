@extends('appanel/template')
@section('content')
<a href="category/create" class="btn btn-primary">Añadir nuevo</a>
@foreach ($categories as $cat)
<li>
	<a href="category/{{$cat->id}}/edit">{{$cat->name}} - {{$cat->status}} - {{$cat->objects}}</a>
	<a href="category/{{$cat->id}}/edit">Editar</a>
	{{Form::model($cat, array('route' => array('appanel.category.destroy', $cat->id), 'class'=>'inline', 'method' => 'DELETE'))}}
		<button type="submit">Borrar</button>
	{{Form::close()}}
</li>
@endforeach
{{--categories->links()--}}
@stop
{{--$notas imprime json--}}