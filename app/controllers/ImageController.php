<?php

class ImageController extends Controller{

	public function upload(){
		$up = Input::hasFile('file');
		if($up){
			Input::file('file')->move('uploads', Input::file('file')->getClientOriginalName());
			$file = URL::asset('uploads/'.Input::file('file')->getClientOriginalName());
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
}