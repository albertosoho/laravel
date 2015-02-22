				@foreach($memes as $m)
					@if($m->type == 1)
					<a href="{{route('meme', array('id' => $m->id))}}">
						<li>
							<div class="superposition">
								<p>{{$m->description}}</p>	
							</div>
							<img class="img-responsive" src="{{URL::asset('/pictures/sq/'.$m->img->url)}}">
						</li>
					</a>
					@else
					<li>
						<iframe src="https://vine.co/v/{{$m->id_vine}}/embed/simple" width="280" height="280" frameborder="0"></iframe><script src="https://platform.vine.co/static/scripts/embed.js"></script>
					</li>
					@endif
				@endforeach