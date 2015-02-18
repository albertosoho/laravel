@extends('header')
@section('scripts')
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
					<li>
						<img class="img-responsive" src="{{URL::asset('/pictures/small/'.$m->img->url)}}">
					</li>
				@endforeach
				</ul>
			</div>
		</div>
	</div>
@include('footer')
<script>
$(document).ready(function(){
	$(window).load(function(){
		widthUl = $('ul.memes').width();
		if($('body').width() > 768){
			widthLi = widthUl/3 - 20;
		}else{
			widthLi = 250;
		}
		$('.memes li').css('width', widthLi);
		var $container = $('ul.memes');
		// initialize
		$container.masonry({
			columnWidth: widthLi,
			itemSelector: '.memes li',
			gutter: 10
		});
	});
});
</script>
</div>
</body>
@stop