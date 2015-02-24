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
		if(!Input::get('idCliente')){

		}else{
			$id = Input::get('idCliente');
			$adds_home = Position::whereIn('id', [1,2,3])->get();
			$adds_videos = Position::whereIn('id', [4,5])->get();
			$adds_notas = Position::whereIn('id', [6,7])->get();
			$adds_video = Position::whereIn('id', [8,9])->get();
			$adds_memeteca = Position::whereIn('id', [10])->get();

			$cliente = Client::find($id);
			$data = array(
				'title' => 'Nuevo anuncio',
				'cliente' => $cliente,
				'home' => $adds_home,
				'videos' => $adds_videos,
				'notas' => $adds_notas,
				'video' => $adds_video,
				'memeteca' => $adds_memeteca,
			);
			return View::make('appanel/anuncios/create', $data);
		}
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
			'price' => 'required|integer',
			'start' => 'required',
			'duration' => 'required',
			'position' => 'required',
			'pic' => 'required|integer|exists:pictures,id',
		);

		$messages = array(
			'price.required' => 'Has dejado el costo vacío',
			'price.integer' => 'El costo debe ser un valor numérico entero, sin comas ni puntos',
			'start.required' => 'La fecha de inicio es imprescindible',
			'duration.required' => 'La fecha de fin es imprescindible',
			'position.required' => 'Coloca la posición del anuncio',
			'pic.required' => 'Debes arrastrar o subir una imágen',
			'integer' => 'Si ves este mensaje haces algo raro >:(',
			'pic.exists' => 'Estás asociando una imágen que no existe'
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.add.create', array('idCliente' => Input::get('cliente_id')))
				->withErrors($validator)
				->withInput();
		} else {
			$add = new Add;
			$add->price = Input::get('price');
			$add->start = Input::get('start');
			$add->duration = Input::get('duration');
			$add->position_id = Input::get('position')[0];
			$add->pic_id = Input::get('pic');
			$add->client_id = Input::get('cliente_id');
			if(Input::has('status')) {
				$add->status = 1;
			}else{
				$add->status = 2;
			}
			$add->save();
		}

		return Redirect::route('appanel.add.index');
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
			'price' => 'required',
			'start' => 'required',
			'duration' => 'required',
			'position' => 'required|',
			'pic' => 'required|integer|exists:pictures,id',
		);

		$messages = array(
			'price.required' => 'Has dejado el costo vacío',
			'start.required' => 'La fecha de inicio es imprescindible',
			'duration.required' => 'La fecha de fin es imprescindible',
			'position.required' => 'Coloca la posición del anuncio',
			'pic.required' => 'Debes arrastrar o subir una imágen',
			'integer' => 'Si ves este mensaje haces algo raro >:(',
			'pic.exists' => 'Estás asociando una imágen que no existe'
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.add.edit', array('id' => $id))
				->withErrors($validator)
				->withInput();
		} else {
			$add = Add::find($id);
			$add->price = Input::get('price');
			$add->start = Input::get('start');
			$add->duration = Input::get('credits');
			$add->position_id = Input::get('position');
			$add->pic_id = Input::get('pic');
			$add->client_id = Input::get('cliente_id');
			if(Input::has('status')) {
				$add->status = 1;
			}else{
				$add->status = 2;
			}
			$add->save();
		}

		return Redirect::to('appanel/add/'.$id.'/edit');
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
