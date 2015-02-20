<!DOCTYPE html>
<html>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
	<meta charset="utf-8" />

	<!-- OPEN GRAPH -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta property="og:type" content="image" />
		<meta property="og:site_name" content="Eugenio Derbez" />
		<meta property="og:image" content="{{URL::to('/').'/pictures'}}" />
		@if(Route::currentRouteName() == 'nota')
			<meta property="og:url" content="{{URL::to('/').'/pictures/sq/'.$nota->img->url}}" />
			<meta property="og:title" content="{{Clean::desc($nota->description, 1000)}}" />
		@elseif(Route::currentRouteName() == 'video')
			<meta property="og:url" content="{{URL::to('/').'/pictures/sq/'.$video->img->url}}" />
			<meta property="og:title" content="{{$video->subtitle}}" />
		@elseif(Route::currentRouteName() == 'meme')
			<meta property="og:url" content="{{URL::to('/').'/pictures/sq/'.$meme->img->url}}" />
			<meta property="og:title" content="{{$meme->description}}" />
		@endif
		<meta property="og:description" content="By EugenioDerbez.tv" />

	<base href="{{asset('/');}}" target="_top">
	<title>{{$title}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/index.css')}}">
	@section('styles')

	@show
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="{{URL::asset('js/modernizr-2.6.2.js')}}"></script>
	<script src="{{URL::asset('js/jquery.slitslider.js')}}"></script>
	@section('scripts')

	@show
	<script src="{{URL::asset('js/index.js')}}"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-47107007-5', 'auto');
		ga('send', 'pageview');
	</script>
</head>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=523067094482053&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
@section('content')
@show
</html>