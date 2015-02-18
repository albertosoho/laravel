<?php

class ImageController extends Controller{

	public function upload(){
		$up = Input::hasFile('file');
		if($up){
			Input::file('file')->move('pictures', Input::file('file')->getClientOriginalName());
			$file = URL::asset('pictures/'.Input::file('file')->getClientOriginalName());
			$pathLarge = public_path('pictures/large/' . $file);
			Image::make($file)->resize(1280, null)->save($pathLarge);
		}
		$status = array();
		if(!$up){
			$status = array(
				'status' => 'error',
				'time'=> array(
					'time' => time()
				),
				'error' => 'error',
				'pic' => 'error'
			);
		}else{
			$status = array(
				'status' => 'success',
				'time'=> array(
					'time' => time()
				),
				'description' => 'Se guardó la imagen',
				'pic' => $file,
				'filelink' => $file
			);
		}
		//$status = json_encode($status);
		return Response::json($status);

	}

	public function index(){

	}

	public function picsJSON(){
		$pictures = Picture::all();
		foreach($pictures as $p){
			$res[] = Array(
				'url' => URL::to('/').'/pictures/sq/' . $p->url,
				'folder' => 'General',
				'image' => URL::to('/').'/pictures/medium/' . $p->url,
				'thumb' => URL::to('/').'/pictures/sq/' . $p->url,
				'name' => $p->oldname,
			);
		}
		return Response::json($res);
	}
}