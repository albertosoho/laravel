<?php

class AddController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$videos = Nota::with('categoria')->paginate(2);//->toJson();
		$adds = Add::orderBy('id', 'desc')->whereStatus(1)->paginate(12);

		$data = array(
			'title' => 'Anuncios',
			'adds' => $adds,
		);
		return View::make('appanel/anuncios/index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = array(
			'title' => 'Nuevo anuncio',
		);
		return View::make('appanel/anuncios/create', $data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//validation videos
		$rules = array(
			'title' => 'required',
			'subtitle' => 'required',
			'credits' => 'required',
			'youtube' => 'required',
			'pic' => 'required|integer|exists:pictures,id',
			'category' => 'required|integer|exists:categories,id',
		);

		$messages = array(
			'title.required' => 'Has dejado el título vacío',
			'subtitle.required' => 'Coloca un subtitulo',
			'credits.required' => 'No has colocado contenido',
			'youtube.required' => 'Debes colocar un video de youtube',
			'pic.required' => 'Debes arrastrar o subir una imágen',
			'category.required' => 'Selecciona una categoría',
			'integer' => 'Si ves este mensaje haces algo raro',
			'category.exists' => 'Estás asociando una categoría que no existe',
			'pic.exists' => 'Estás asociando una imágen que no existe'
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.video.create')
				->withErrors($validator)
				->withInput();
		} else {
			$yt = preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", Input::get('youtube'), $ytIDs);
			$youtube_ID = empty($ytIDs[0]) ? 'none' : $ytIDs[0];

			$video = new Video;
			$video->title = Input::get('title');
			$video->subtitle = Input::get('subtitle');
			$video->credits = Input::get('credits');
			$video->tags = Input::get('tags');
			$video->youtube = $youtube_ID;
			$video->author = Auth::id();
			$video->type = 'youtube';
			$video->pic = Input::get('pic');
			$video->category = Input::get('category');
			if(Input::has('status')) {
				$video->status = 1;
			}else{
				$video->status = 2;
			}
			$video->save();
		}

		return Redirect::route('appanel.video.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		echo 'show'.$id;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$add = Add::find($id);
		$data = array(
			'title' => 'Editar Anuncio',
			'add' => $add,
		);
		return View::make('appanel/anuncios/edit', $data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//validation videos
		$rules = array(
			'title' => 'required',
			'subtitle' => 'required',
			'credits' => 'required',
			'youtube' => 'required',
			'pic' => 'required|integer|exists:pictures,id',
			'category' => 'required|integer|exists:categories,id',
		);

		$messages = array(
			'title.required' => 'Has dejado el título vacío',
			'subtitle.required' => 'Coloca un subtitulo',
			'credits.required' => 'No has colocado contenido',
			'youtube.required' => 'Debes colocar un video de youtube',
			'pic.required' => 'Debes arrastrar o subir una imágen',
			'category.required' => 'Selecciona una categoría',
			'integer' => 'Si ves este mensaje haces algo raro',
			'category.exists' => 'Estás asociando una categoría que no existe',
			'pic.exists' => 'Estás asociando una imágen que no existe'
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.video.edit', array('id'=>$id))
				->withErrors($validator)
				->withInput();
		} else {

			$video = Video::find($id);
			$video->title = Input::get('title');
			$video->subtitle = Input::get('subtitle');
			$video->credits = Input::get('credits');
			$video->tags = Input::get('tags');
			$video->youtube = $youtube_ID;
			$video->tags = Input::get('tags');
			$video->author = Auth::id();
			$video->type = Input::get('type');
			$video->pic = Input::get('pic');
			$video->category = Input::get('category');
			if(Input::has('status')) {
				$video->status = 1;
			}else{
				$video->status = 2;
			}
			$video->save();
		}

		return Redirect::to('appanel/video/'.$id.'/edit');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$add = Add::find($id);
		$add->status = 0;
		$add->save();

		return Redirect::to('appanel/add/');
	}

}
