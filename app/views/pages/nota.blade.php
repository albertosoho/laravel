@extends('header')

@section('content')
<body id="nota">
	<div class="wrapper-container">
	@include('nav')
	<div class="container">
	@if(!Agent::isMobile())
	<!-- SLIDER -->
	<div class="row">
		<div class="col-md-24">
			<div id="slider" class="sl-slider-wrapper top">
				<div class="sl-slider">
					<div class="sl-slide" data-uid="{{$articulo[0]->uid}}" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner" style="background-image: url('pictures/large/{{$picture[0]->url}}');">
							<div class="bottom-preguntame">
								<div class="row">
									<div class="col-md-20 col-md-offset-2">
										<h1>{{$articulo[0]->title}}</h1>
										<p>{{substr(strip_tags($articulo[0]->content), 0 , 250) }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<nav id="nav-arrows" class="nav-arrows">
					<span class="nav-arrow-prev">Anterior</span>
					<span class="nav-arrow-next">Siguiente</span>
				</nav>
			</div>
		</div>
	</div>
	@else
	<!-- POSTS NAVIGATION -->
	<div class="ad-movil"></div>
	@endif

	<!-- NOTA -->
	<div class="row">
		<div class="col-md-24">
			<section class="notas">
				@if(!Agent::isMobile())
					@foreach ($notas as $nota)
					<div class="nota">
						<article data-uid="{{$nota->vuid}}" style="background: #000 url('pictures/small/{{$nota->url}}') center no-repeat; background-size: cover;">
						<a href="nota/{{$nota->vuid}}" title="{{$nota->title}}">
							<span class="cat">{{$nota->name}}</span>
							<div class="ft">
								<h1>{{$nota->title}}</h1>
							</div>
						</a>
						</article>
						<p>{{substr(strip_tags($nota->description), 0, 50)}}...</p>
					</div>
					@endforeach
				@endif
				<article class="articulo">
					{{$articulo[0]->content}}
				</article>
			</section>
		</div>
	</div>

	<!-- COMMENTS -->
	<div class="row">
		<div class="col-md-24">
			<section class="comments">
				@foreach ($notas as $nota)
				<div class="nota">
					<article data-uid="{{$nota->vuid}}" style="background: #000 url('pictures/small/{{$nota->url}}') center no-repeat; background-size: cover;">
					<a href="nota/{{$nota->vuid}}" title="{{$nota->title}}">
						<span class="cat">{{$nota->title}}</span>
						<div class="ft">
							<h1>{{$nota->title}}</h1>
						</div>
					</a>
					</article>
					<p>{{substr(strip_tags($nota->description), 0, 50)}}...</p>
				</div>
				@endforeach
				@if(!Agent::isMobile())
				<div class="comments-box">
					<div class="text">Comentarios</div>
				</div>
				<div class="comment-bottom">
					@include('comments')
				</div>
				@endif
			</section>
		</div>
	</div>
	@if(Agent::isMobile())
		<div class="ad-movil"></div>
	@endif
@include('footer')
</div>
</body>
@stop