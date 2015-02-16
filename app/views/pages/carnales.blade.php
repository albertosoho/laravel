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
							<li><a href="videos/{{$c->uid}}">{{$c->name}}</a></li>
							@endforeach
						</ul>
						<div class="ad-cuadro">
<!-- SQ_Ads_P5 -->
<ins class="adsbygoogle"
style="display:inline-block;width:300px;height:250px"
data-ad-client="ca-pub-3284457972326292"
data-ad-slot="7339020361"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
						</div>
						<h4>
							Populares
						</h4>
						<div class="populares">
							<?php $i = 1 ?>
							@foreach ($videos as $video)
							<div class="vid-content">
								<article class="video" data-uid="{{ $video->vuid }}" style="background: #000 url('pictures/small/{{$video->url}}') center no-repeat; background-size: cover;">
									<a href="video/{{ $video->vuid }}" title="{{ $video->title }}">
										<div class="ft">
											<h1>{{ $video->title }}</h1>
										</div>
										<div class="amas">
											<i class="mas"></i>
											<span>{{ $video->name}}</span>
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
				@if(!Agent::isMobile())
				<!-- SLIDER -->
					<div id="slider" class="sl-slider-wrapper">
						<div class="sl-slider">
							@foreach($videos as $video )
							<div class="sl-slide" data-uid="{{ $video->vuid }}" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
								<div class="sl-slide-inner" style="background-image: url('pictures/normal/{{$video->url}}');">
									<h1><a href="video/{{ $video->vuid }}">{{ $video->title }}</a></h1>
								</div>
							</div>
							@endforeach
						</div>
						<nav id="nav-arrows" class="nav-arrows">
							<span class="nav-arrow-prev">Anterior</span>
							<span class="nav-arrow-next">Siguiente</span>
						</nav>

						<nav id="nav-dots" class="nav-dots">
							<span class="nav-dot-current"></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</nav>
					</div>
					<p class="slider-home">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet</p>
				@else
				<!-- SLIDER -->

				@endif

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
								<article class="video" data-uid="{{ $video->vuid }}" style="background: #000 url('pictures/small/{{$video->url}}') center no-repeat; background-size: cover;">
									<a href="video/{{ $video->vuid }}" title="{{ $video->title }}">
										<div class="ft">
											<h1>{{ $video->title }}</h1>
										</div>
										<div class="amas">
											<i class="mas"></i>
											<span>{{ $video->name }}</span>
										</div>
									</a>
								</article>
								<p>{{ substr($video->subtitle, 0, 50) }}... </p>
							</div>
								@if($i == 6)
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
									<article class="video" data-uid="{{ $video->vuid }}" style="background: #000 url('pictures/small/{{$video->url}}') center no-repeat; background-size: cover;">
										<a href="video/{{ $video->vuid }}" title="{{ $video->title }}">
											<div class="ft">
												<h1>{{ $video->title }}</h1>
											</div>
											<div class="amas">
												<i class="mas"></i>
												<span>{{ $video->name }}</span>
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
			<div class="ad-cuadro">
<!-- SQ_Ads_P5 -->
<ins class="adsbygoogle"
style="display:inline-block;width:300px;height:250px"
data-ad-client="ca-pub-3284457972326292"
data-ad-slot="7339020361"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
			</div>
		@endif
@include('footer')
</div>
</body>
@stop