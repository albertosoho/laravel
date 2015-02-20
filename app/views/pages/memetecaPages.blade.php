@foreach($memes as $m)
	<li>
		<!--<img class="img-responsive" src="{{URL::asset('/pictures/small/'.$m->img->url)}}">-->
		<div class="superposition">
			<p>{{$m->description}}</p>	
		</div>
		<img class="img-responsive" style="width:100%;height:auto" src="http://www.forpcapps.com/wp-content/uploads/2014/05/2.jpg">
	</li>
@endforeach