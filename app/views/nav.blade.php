	<nav class="menu">
		<div class="container">
			<div class="row">
				<div class="col-md-24">
					<div class="logo">
						<a href="home">
							<img class="img-responsive" src="img/logo.png">
						</a>
					</div>
					<ul>
						<li>
							<a href="home">
								inicio
							</a>
						</li>
						<li>
							<a class="vlink" href="carnales">
								videos <span>›</span>
							</a>
						</li>
						<li>
							<a class="plink" href="preguntame">
								pregúntame <span>›</span>
							</a>
						</li>
						<li>
							<a href="home">
								memeteca
							</a>
						</li>
						<li>
							<a href="derbez">
								Derbez
							</a>
						</li>
					</ul>
					<ul class="social">
						<li>
							<a href="https://vine.co/eugenioderbezTV" title="Vine de Eugenio Derbez"><img src="img/vine.png" alt="Vine"></a>
						</li>
						<li>
							<a href="https://twitter.com/EugenioDerbez" title="Twitter de Eugenio Derbez"><img src="img/twitter.png" alt="Twitter"></a>
						</li>
						<li>
							<a href="https://www.facebook.com/pages/Eugenio-Derbez/148393515248368" title="Facebook de Eugenio Derbez"><img src="img/facebook.png" alt="Facebook"></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<nav class="mobil">
		<div class="logo">
			<a href="/">
				<img class="img-responsive" src="img/logo.png">
			</a>
		</div>
		<span class="button"></span>
		<ul>
			<li>
				<a href="home">
					inicio
				</a>
			</li>
			<li>
				<a href="carnales">
					videos
				</a>
			</li>
			<li>
				<a href="preguntame">
					pregúntame
				</a>
			</li>
			<li>
				<a href="memeteca">
					memeteca
				</a>
			</li>
			<li>
				<a href="derbez">
					Derbez
				</a>
			</li>
		</ul>
	</nav>
	<div class="videover">
		<div class="row">
			<div class="col-md-24">
				@foreach ($videos_nav as $video)
				<div class="vid-content">
					<article class="video" data-uid="{{$video->id}}" style="background: #000 url('pictures/small/{{--$video->img->url--}}') center no-repeat; background-size: cover;">
						<a href="video/{{$video->id}}" title="{{$video->title}}">
							<div class="ft">
								<h1>{{$video->title}}</h1>
							</div>
							<div class="amas">
								<i class="mas"></i>
								<span>{{$video->categoria->name}}</span>
							</div>
						</a>
					</article>
					<p>{{substr($video->subtitle, 0, 50)}}... </p>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="preguntaover">
		<div class="row">
			<div class="col-md-24">
				@foreach ($notas_nav as $nota)
				<div class="nota">
					<article data-uid="{{$nota->id}}" style="background: #000 url('pictures/small/{{$nota->img->url}}') center no-repeat; background-size: cover;">
						<a href="nota/{{$nota->id}}" title="{{$nota->title}}">
							<span class="cat">{{$nota->categoria->name}}</span>
							<div class="ft">
								<h1>{{$nota->title}}</h1>
								<span>{{$nota->categoria->name}}</span>
							</div>
						</a>
					</article>
					<p>{{substr(strip_tags($nota->description), 0, 50)}}...</p>
				</div>
				@endforeach
			</div>
		</div>
	</div>