<!DOCTYPE html>
<html>
<head>
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
@section('content')
@show
</html>