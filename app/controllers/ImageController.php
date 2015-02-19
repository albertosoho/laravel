<?php

class ImageController extends Controller{

	public function upload(){
		$up = Input::hasFile('file');
		if($up){
			Input::file('file')->move('pictures', Input::file('file')->getClientOriginalName());
			$fileUrl = URL::asset('pictures/'.Input::file('file')->getClientOriginalName());
			$file = public_path('pictures/'.Input::file('file')->getClientOriginalName());
			$pathLarge = public_path('pictures/large/'.Input::file('file')->getClientOriginalName());
			$pathNormal = public_path('pictures/normal/'.Input::file('file')->getClientOriginalName());
			$pathMedium = public_path('pictures/medium/'.Input::file('file')->getClientOriginalName());
			$pathSmall = public_path('pictures/small/'.Input::file('file')->getClientOriginalName());
			$pathSq = public_path('pictures/sq/'.Input::file('file')->getClientOriginalName());
			$pathSqm = public_path('pictures/sqm/'.Input::file('file')->getClientOriginalName());
			$pathThumb = public_path('pictures/thumb/'.Input::file('file')->getClientOriginalName());
			Image::make($file)->resize(1280, null)->save($pathLarge);
			Image::make($file)->resize(960, null)->save($pathNormal);
			Image::make($file)->resize(640, null)->save($pathMedium);
			Image::make($file)->resize(320, null)->save($pathSmall);
			Image::make($file)->resize(160, null)->save($pathThumb);
			Image::make($file)->resize(256, 256)->save($pathSq);
			Image::make($file)->resize(64, 64)->save($pathSqm);
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
				'pic' => $fileUrl,
				'filelink' => $fileUrl,
			);
		}
		//$status = json_encode($status);
		return Response::json($status);

	}

	public function index(){
		echo public_path('pictures/large/');
	}

	public function picsJSON(){
		$pictures = Picture::all();
		/*foreach($pictures as $p){
			$res[] = Array(
				'url' => URL::to('/').'/pictures/sq/' . $p->url,
				'folder' => 'General',
				'image' => URL::to('/').'/pictures/medium/' . $p->url,
				'thumb' => URL::to('/').'/pictures/sq/' . $p->url,
				'name' => $p->oldname,
			);
		}
		return Response::json($res);*/
	}
}