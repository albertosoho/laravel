<?php

class NotaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$notas = Nota::with('categoria')->paginate(2);//->toJson();
		$notas = Nota::orderBy('id', 'desc')->whereStatus(1)->paginate(10);
		$data = array(
			'title' => 'Notas',
			'notas' => $notas,
		);
		return View::make('appanel/notas/index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::categoryType('nota')->get();
		$data = array(
			'title' => 'Nueva nota',
			'categories' => $categories
		);
		return View::make('appanel/notas/create', $data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$nota = new Nota;
		$nota->title = Input::get('title');
		$nota->content = Input::get('content');
		$nota->category = Input::get('category');
		$nota->description = Input::get('description');
		$nota->tags = Input::get('tags');
		$nota->fuente = Input::get('fuente');
		$nota->status = Input::get('status');
		$nota->author = Auth::id();
		$nota->save();

		return Redirect::to(route('appanel.nota.index'));
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
		$categories = Category::categoryType('nota')->get();
		$nota = Nota::find($id);
		$data = array(
			'title' => 'Editar',
			'nota' => $nota,
			'categories' => $categories
		);
		return View::make('appanel/notas/edit', $data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$nota = Nota::find($id);
		$nota->title = Input::get('title');
		$nota->content = Input::get('content');
		$nota->category = Input::get('category');
		$nota->description = Input::get('description');
		$nota->tags = Input::get('tags');
		$nota->fuente = Input::get('fuente');
		$nota->status = Input::get('status');
		$nota->author = Auth::id();
		$nota->save();

		return Redirect::to('appanel/nota/'.$id.'/edit');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$nota = Nota::find($id);
		$nota->status = 0;
		$nota->save();

		return Redirect::to('appanel/nota/');
	}


}
