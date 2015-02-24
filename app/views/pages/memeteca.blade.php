@extends('header')
@section('scripts')
	<script src="{{URL::asset('js/b.js')}}"></script>
	<script src="{{URL::asset('js/masonry.min.js')}}"></script>
@stop
@section('content')
<body id="memeteca">
	<div class="wrapper-container">
	@include('nav')
	<div class="container-fluid">
		<div class="row">
			<div class="memeteca">
				<div class="escudo">
					<img class="img-responsive" src="img/memeteca.png">
				</div>
				@if(!Agent::isMobile())
					<div class="ad-mega">
							<!-- HRAds - P1 -->
							<ins class="adsbygoogle"
							style="display:inline-block;width:1020px;height:150px"
							data-ad-client="ca-pub-3284457972326292"
							data-ad-slot="5083557964"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
					</div>
				@else
					<div class="ad-movil"></div>
				@endif
				<ul class="memes">
				@foreach($memes as $m)
					@if($m->type == 1)
						<li>
					<a href="{{route('meme', array('id' => $m->id))}}">
							<div class="superposition">
								<p>{{$m->description}}</p>	
							</div>
							<img class="img-responsive" src="{{URL::asset('/pictures/small/'.$m->img->url)}}">
					</a>
						</li>
					@else
					<li>
						<iframe src="https://vine.co/v/{{$m->id_vine}}/embed/simple" width="300" height="300" frameborder="0"></iframe><script src="https://platform.vine.co/static/scripts/embed.js"></script>
					</li>
					@endif
				@endforeach
				</ul>
			</div>
		</div>
	</div>
@include('footer')
<script>
$(document).ready(function(){

	$(window).load(function(){

		var $container = $('ul.memes');
		// initialize
		$container.masonry({
			columnWidth: 300,
			itemSelector: '.memes li',
			//isFitWidth: true,
			gutter: 20
		});

		//load memes
		pages = {{$memes->count()}};
		current = 1;

		$('.memes').animate({
			opacity: 1,
		}, 500);

		$(window).scroll(function() {
			if($(window).scrollTop() + $(window).height() == $(document).height()) {
				page = current + 1;
				$.ajax({
					type: 'GET',
					url: '{{route('memetecapages')}}',
					data: {page : page},
					cache: false,
				}).done(function(html){
					if (html.length > 0) {
						var el = $(html);
						$('.memes').append(el);//.masonry();//( 'appended', el, true );
						$('.memes').masonry('reloadItems');
						$('.memes').masonry('layout');
						current = current + 1;
					}
				});
			}
		});
	});
});
</script>
</div>
</body>
@stop