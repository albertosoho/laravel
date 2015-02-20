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
					<div class="ad-mega"></div>
				@else
					<div class="ad-movil"></div>
				@endif
				<ul class="memes">
				@foreach($memes as $m)
					@if(isset($m->img->url))
					<li>
						<div class="superposition">
							<p>{{$m->description}}</p>	
						</div>
						<img class="img-responsive" src="{{URL::asset('/pictures/small/'.$m->img->url)}}">
					</li>
					@else
					<li>
						<iframe src="https://vine.co/v/{{$m->id_vine}}/embed/simple" width="600" height="600" frameborder="0"></iframe><script src="https://platform.vine.co/static/scripts/embed.js"></script>
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
			columnWidth: 280,
			itemSelector: '.memes li',
			//isFitWidth: true,
			gutter: 20
		});

		//load memes
		pages = {{$memes->count()}};
		current = 1;

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
						$('.memes').append(el).masonry( 'appended', el, true );
						current = current + 1;
						console.log(current);
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