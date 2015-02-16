<?php

class VideoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$videos = Nota::with('categoria')->paginate(2);//->toJson();
		$videos = Video::orderBy('id', 'desc')->whereStatus(1)->paginate(10);
		$data = array(
			'title' => 'Videos',
			'videos' => $videos,
		);
		return View::make('appanel/videos/index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::categoryType('video')->get();
		$data = array(
			'title' => 'Nueva video',
			'categories' => $categories
		);
		return View::make('appanel/videos/create', $data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$video = new Video;
		$video->title = Input::get('title');
		$video->subtitle = Input::get('subtitle');
		$video->credits = Input::get('credits');
		$video->tags = Input::get('tags');
		$video->youtube = Input::get('youtube');
		$video->tags = Input::get('tags');
		$video->author = Auth::id();
		$video->type = Input::get('type');
		$video->category = Input::get('category');
		$video->status = Input::get('status');
		$video->save();

		return Redirect::to(route('appanel.video.index'));
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
		$categories = Category::categoryType('video')->get();
		$video = Video::find($id);
		$data = array(
			'title' => 'Editar',
			'video' => $video,
			'categories' => $categories
		);
		return View::make('appanel/videos/edit', $data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$video = Video::find($id);
		$video->title = Input::get('title');
		$video->content = Input::get('content');
		$video->save();

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
		$video = Video::find($id);
		$video->status = 0;
		$video->save();

		return Redirect::to('appanel/video/');
	}


}
