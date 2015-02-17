@extends('header')
@section('content')
<body id="preguntame">
	<div class="wrapper-container">
	@include('nav')
	<div class="container">
		@if(Agent::isMobile())

		@else
		<!-- SLIDER -->
		<div class="row">
			<div class="col-md-24">
				<div id="slider" class="sl-slider-wrapper top">
					<div class="sl-slider">
						@foreach ($notas as $nota)
						<div class="sl-slide" data-uid="{{$nota->id}}" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
							<div class="sl-slide-inner" style="background-image: url('pictures/normal/{{$nota->cover}}');">
								<div class="bottom-preguntame">
									<div class="row">
										<div class="col-md-20 col-md-offset-2">
											<h1><a href="nota/{{$nota->id}}">{{$nota->title}}</a></h1>
											<p>{{substr(strip_tags($nota->content), 0, 250) }}...</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<nav id="nav-arrows" class="nav-arrows">
						<span class="nav-arrow-prev">Anterior</span>
						<span class="nav-arrow-next">Siguiente</span>
					</nav>
				</div>
			</div>
		</div>
		@endif
		<h3 class="the_new">Lo nuevo <span>></span></h3>
		@if(Agent::isMobile())
		<!-- SECTION -->
		<div class="row">
			<div class="col-md-24">
				<section class="blog">
					@foreach ($notas as $nota)
					<div class="nota">
						<article data-uid="{{$nota->id}}" style="background: #000 url('pictures/small/{{$nota->cover}}') center no-repeat; background-size: cover;">
						<a href="nota/{{$nota->id}}" title="{{$nota->title}}">
							<span class="cat">{{$nota->name}}</span>
							<div class="ft">
								<h1>{{$nota->title}}</h1>
							</div>
						</a>
						</article>
						<p>{{substr(strip_tags($nota->description), 0, 50)}}...</p>
					</div>
					@endforeach
				</section>
			</div>
		</div>
		@else
		<!-- SECTION -->
		<div class="row">
			<div class="col-md-24">
				<section class="blog">
					<div class="ad-horizontal">
						<!-- HRAds - P1 -->
						<ins class="adsbygoogle"
						style="display:inline-block;width:728px;height:90px"
						data-ad-client="ca-pub-3284457972326292"
						data-ad-slot="5083557964"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
					<?php $i = 1 ?>
					@foreach ($notas as $nota)
					<div class="nota">
						<article data-uid="{{$nota->id}}" style="background: #000 url('pictures/small/{{$nota->cover}}') center no-repeat; background-size: cover;">
						<a href="nota/{{$nota->id}}" title="{{$nota->title}}">
							<span class="cat">{{$nota->name}}</span>
							<div class="ft">
								<h1>{{$nota->title}}</h1>
							</div>
						</a>
						</article>
						<p>{{substr(strip_tags($nota->description), 0, 50)}}...</p>
					</div>
					@if($i == 6)
						<?php break; ?> 
					@endif
					<?php $i++ ?>
					@endforeach
				</section>
			</div>
		</div>

		<!-- SECTION -->
		<div class="row">
			<div class="col-md-24">
				<section class="blog blog-2">
					<?php $i = 1 ?>
					@foreach ($notas as $nota)
					@if($i > 6)
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
					@endif
					<?php $i++ ?>
					@endforeach
				</section>
			</div>
		</div>
		@endif
		{{$notas->links()}}
		@if(!Agent::isMobile())
					<div class="ad-horizontal">
						<!-- HRAds - P1 -->
						<ins class="adsbygoogle"
						style="display:inline-block;width:728px;height:90px"
						data-ad-client="ca-pub-3284457972326292"
						data-ad-slot="5083557964"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
		@else
			<div class="ad-cuadro"></div>
		@endif
	</div>
@include('footer')
</div>
</body>
@stop