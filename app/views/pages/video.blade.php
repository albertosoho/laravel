@extends('header')
@section('content')
<body id="video">
	<div class="wrapper-container">
	@include('nav')
	<div class="container">
		<div class="row">
			<div class="content-video top">
				<div class="row">
					<div class="col-md-24">
						<div class="row">
							<div class="col-md-24">
								<div class="lineas-3">
									{{$video->categoria->name}}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-24">
								<div class="video-content">
									<!-- VIDEO CONTENT -->
									<div class="col-md-16 video-article">
										<script type="text/javascript">
										/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
										var disqus_shortname = 'eugenioderbez'; // required: replace example with your forum shortname

										/* * * DON'T EDIT BELOW THIS LINE * * */
										(function () {
											var s = document.createElement('script'); s.async = true;
											s.type = 'text/javascript';
											s.src = '//' + disqus_shortname + '.disqus.com/count.js';
											(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);

											$('.like').click(function () {
												$.post('', {
													'uid': '',
													'type': 'videos'
												}, function (r) {
													r = JSON.parse(r);
													$('.nlikes').text(r.likes + ' Me gusta');
												});
											});
										}());
										</script>
										<article>
											<h1>{{ $video->title }}</h1>
											<figure class="video-container">
												<ul class="social-video">
													<li class="fb">
														<span>
															<a href="http://www.facebook.com/sharer/sharer.php?u={{URL::to('/').'video/'.$video->id}}">
															<img src="{{URL::asset('img/face.png')}}">
															</a>
														</span>
													</li>
													<li class="tt">
														<span>
															<a href="https://twitter.com/share" data-via="eugenioderbez" data-lang="es">
																<img src="{{URL::asset('img/twit.png')}}">
															</a>
														</span>
													</li>
												</ul>
												<iframe width="853" height="480" src="//www.youtube.com/embed/{{ $video->youtube}}?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
											</figure>
											{{$video->credits}}
										</article>
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
											<div class="ad-movil"></div>
										@endif
										<!-- comments -->
										<div class="row">
											<div class="col-md-24">
												<section class="comments">
													<div class="comments-box">
														<div class="text">Comentarios</div>
													</div>
													<div class="comment-bottom">
														@include('comments')
													</div>
												</section>
											</div>
										</div>
									</div>
									@if(!Agent::isMobile())
									<!-- SIDEBAR -->
									<aside class="col-md-8">
										<?php $i = 1; ?>
										@foreach ($videos as $video)
											<div class="vid-content">
												<article class="video" data-uid="{{$video->vuid}}" style="background: #000 url('pictures/small/{{$video->url}}') center no-repeat; background-size: cover;">
													<a href="video/{{$video->vuid}}" title="{{$video->title}}">
														<div class="ft">
															<h1>{{str_replace('"', '', $video->title)}}</h1>
														</div>
														<div class="amas">
															<i class="mas"></i>
															<span>{{$video->categoria->name}}</span>
														</div>
													</a>
												</article>
											</div>
											@if($i == 3)
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
											<?php $i++ ?>
										@endforeach

										<h3>recomendados</h3>
										@foreach ($videos as $video)
											<div class="vid-content">
												<article class="video" data-uid="{{$video->vuid}}" style="background: #000 url('pictures/small/{{$video->url}}') center no-repeat; background-size: cover;">
													<a href="video/{{$video->vuid}}" title="{{$video->title}}">
														<div class="ft">
															<h1>{{str_replace('"', '', $video->title)}}</h1>
														</div>
														<div class="amas">
															<i class="mas"></i>
															<span>{{$video->categoria->name}}</span>
														</div>
													</a>
												</article>
											</div>
										@endforeach
									</aside>
									@endif
									<div style="clear:both"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@if(Agent::isMobile())
		<div class="ad-movil"></div>
	@endif
@include('footer')
</div>
</body>
@stop