<?php

class MemeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$memes = Meme::orderBy('id', 'desc')->whereStatus(1)->paginate(12);
		$data = array(
			'title' => 'Memes',
			'memes' => $memes
		);
		return View::make('appanel/memes/index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Input::get('type') == 'meme'){
			$data = array(
				'title' => 'Nuevo Meme',
			);
			return View::make('appanel/memes/create-meme', $data);
		}elseif (Input::get('type') == 'vine') {
			$data = array(
				'title' => 'Nuevo Vine',
			);
			return View::make('appanel/memes/create-vine', $data);
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
