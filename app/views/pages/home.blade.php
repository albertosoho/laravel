@extends('header')

@section('content')
<body id="home">
	<div class="wrapper-container">
	@include('nav')
	<div class="container">
		<div class="row">
			<header>
				<div class="col-md-24">
					<figure class="ciudad top"></figure>
				</div>
			</header>
		</div>
		<!-- SLIDER -->
		@if(!Agent::isMobile())
		<div class="row">
			<div class="col-md-24">
				<section class="slider">
					<div id="slider" class="sl-slider-wrapper">
						<div class="sl-slider">
							<div class="sl-slide" data-uid="uid_HBTMfanO" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
								<div class="sl-slide-inner" style="background-image: url('pictures/normal/{{$videos[0]->url}}'); background-position: center;">
									<h1><a href="video/{{$videos[0]->vuid}}">{{$videos[0]->title}}</a></h1>
								</div>
							</div>
						</div>
						<div class="sl-slider">
							<div class="sl-slide" data-uid="uid_HBTMfanO" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
								<div class="sl-slide-inner" style="background-image: url('pictures/normal/{{$notas[0]->url}}'); background-position: center;">
									<h1><a href="video/{{$notas[0]->vuid}}">{{$notas[0]->title}}</a></h1>
								</div>
							</div>
						</div>
						<div class="sl-slider">
							<div class="sl-slide" data-uid="uid_HBTMfanO" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
								<div class="sl-slide-inner" style="background-image: url('pictures/normal/{{$videos[1]->url}}'); background-position: center;">
									<h1><a href="video/{{$videos[1]->vuid}}">{{$videos[1]->title}}</a></h1>
								</div>
							</div>
						</div>
						<div class="sl-slider">
							<div class="sl-slide" data-uid="uid_HBTMfanO" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
								<div class="sl-slide-inner" style="background-image: url('pictures/normal/{{$notas[1]->url}}'); background-position: center;">
									<h1><a href="video/{{$notas[1]->vuid}}">{{$notas[1]->title}}</a></h1>
								</div>
							</div>
						</div>
						<div class="sl-slider">
							<div class="sl-slide" data-uid="uid_HBTMfanO" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
								<div class="sl-slide-inner" style="background-image: url('pictures/normal/{{$videos[0]->url}}'); background-position: center;">
									<h1><a href="video/{{$videos[0]->vuid}}">{{$videos[0]->title}}</a></h1>
								</div>
							</div>
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
					<p class="slider-home"></p>
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
				</section>
			</div>
		</div>
		@endif

		@if(Agent::isMobile())
			<div class="ad-movil"></div>
		@endif

		<!-- VIDEOS -->
		<div class="row">
			<div class="col-md-24">
				<section class="videos">
					<h1 class="title">Videos</h1>
					<div class="articles">
						@foreach ($videos as $video)
						<div class="vid-content">
							<article class="video" data-uid="{{$video->vuid}}" style="background: #000 url('pictures/small/{{$video->url}}') center no-repeat; background-size: cover;">
								<a href="video/{{$video->vuid}}" title="{{$video->subtitle}}">
									<div class="ft">
										<h1>{{$video->title}}</h1>
									</div>
									<div class="amas">
										<i class="mas"></i>
										<span>{{$video->name}}</span>
									</div>
								</a>
							</article>
							<p>{{substr($video->subtitle, 0, 50)}}...</p>
						</div>
						@endforeach
					</div>
					<div class="view-more">
						<a href="carnales">ver más...</a>
					</div>
				</section>
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

		<!-- PREGUNTAME -->
		<div class="row">
			<div class="col-md-24">
				<section class="preguntame">
					<h1 class="title">Pregúntame</h1>
					<div class="articles">
						@foreach ($notas as $nota)
						<div class="nota">
							<article data-uid="{{$nota->vuid}}" style="background: #000 url('pictures/small/{{$nota->url}}') center no-repeat; background-size: cover;">
								<a href="nota/{{$nota->vuid}}" title="Grandes actores que no han ganado el Oscar.">
									<span class="cat">{{$nota->name}}</span>
									<div class="ft">
										<h1>{{$nota->title}}</h1>
										<span>{{$video->categoria->name}}</span>
									</div>
								</a>
							</article>
							<p>{{utf8_decode(substr(strip_tags($nota->description), 0, 50))}}</p>
						</div>
						@endforeach
					</div>
					<div class="view-more">
						<a href="preguntame">ver más...</a>
					</div>
				</section>
			</div>
		</div>

		<!-- ABUSO OPORTUNO -->
		<div class="row">
			<div class="col-md-24">
				<aside id="redes">
					<div class="row">
						<div class="col-md-8 col-md-offset-4">
							<div id="twitter">
								<div class="bg">
									<img  class="img-responsive" id="twheader" src="img/twheader.png" />
									<div class="scroll">
										<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/EugenioDerbez" data-widget-id="499709910397906944">Tweets por @EugenioDerbez</a>
										<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-8">
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
							<div class="side">
								<div id="linksitunes">
									<a id="linkit2" href="https://itunes.apple.com/mx/movie/no-eres-tu-soy-yo/id435869493"></a>
									<a id="linkit1" href="https://itunes.apple.com/mx/movie/no-se-aceptan-devoluciones/id794259708"></a>
								</div>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</div>
		@if(Agent::isMobile())
			<div class="ad-movil"></div>
		@else
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
	</div>
@include('footer')
</div>
</body>
@stop