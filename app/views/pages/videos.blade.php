@extends('header')
@section('content')
<body id="carnales">
	<div class="wrapper-container">
	@include('nav')
	<div class="container">
		<div class="row">
			<div class="content-videos top">
				<!-- SIDEBAR -->
				<aside class="col-md-7 sidebar">
					<div class="row">
						<h4>
							Categorías
						</h4>
						<ul>
							@foreach($categories as $c)
							<li><a href="videos/{{$c->id}}">{{$c->name}}</a></li>
							@endforeach
						</ul>
						<div class="ad-cuadro"></div>
						<h4>
							Populares
						</h4>
						<div class="populares">
							<?php $i = 1 ?>
							@foreach ($videos as $video)
							<div class="vid-content">
								<article class="video" data-uid="{{ $video->id }}" style="background: #000 url('pictures/small/{{$video->url}}') center no-repeat; background-size: cover;">
									<a href="video/{{ $video->id }}" title="{{ $video->title }}">
										<div class="ft">
											<h1>{{ $video->title }}</h1>
										</div>
										<div class="amas">
											<i class="mas"></i>
											<span>{{ $video->categoria->name}}</span>
										</div>
									</a>
								</article>
								<p>{{substr($video->subtitle, 0, 50) }}... </p>
							</div>
							@if($i == 3)
								<?php break; ?>
							@endif
							<?php $i++ ?>
							@endforeach
						</div>
					</div>
				</aside>
				<!-- VIDEO BODY -->
				<div class="col-md-17 carnales">

				@if(Agent::isMobile())
					<div class="ad-movil"></div>
				@endif

				<h4 class="the_new">Lo nuevo <span>></span></h4>
				@if(!Agent::isMobile())
					<!-- RECIENTES -->
					<section class="recientes">
						<h3>Videos recientes</h3>
						<div>
							<?php $i = 1 ?>
							@foreach ($videos as $video)
							<div class="vid-content">
								<article class="video" data-uid="{{ $video->id }}" style="background: #000 url('pictures/small/{{$video->url}}') center no-repeat; background-size: cover;">
									<a href="video/{{ $video->id }}" title="{{ $video->title }}">
										<div class="ft">
											<h1>{{ $video->title }}</h1>
										</div>
										<div class="amas">
											<i class="mas"></i>
											<span>{{ $video->categoria->name }}</span>
										</div>
									</a>
								</article>
								<p>{{ substr($video->subtitle, 0, 50) }}... </p>
							</div>
								@if($i == 6)
								<div class="ad-horizontal"></div>
								@endif
							<?php $i++ ?>
							@endforeach
						</div>
					</section>
				@else
					<!-- RECIENTES -->
					<section class="container-vid-movil">
						<h4 class="new-videos">Nuevos Videos</h4>
						<section class="recientes">
							<div>
								@foreach ($videos as $video)
								<div class="vid-content">
									<article class="video" data-uid="{{ $video->id }}" style="background: #000 url('pictures/small/{{$video->url}}') center no-repeat; background-size: cover;">
										<a href="video/{{ $video->id }}" title="{{ $video->title }}">
											<div class="ft">
												<h1>{{ $video->title }}</h1>
											</div>
											<div class="amas">
												<i class="mas"></i>
												<span>{{ $video->categoria->name }}</span>
											</div>
										</a>
									</article>
									<p>{{ substr($video->subtitle, 0, 50) }}... </p>
								</div>
								@endforeach
							</div>
						</section>
					</section>
				@endif
				</div>
			</div>
		</div>
		@if(Agent::isMobile())
			<div class="ad-cuadro"></div>
		@endif
@include('footer')
</div>
</body>
@stop