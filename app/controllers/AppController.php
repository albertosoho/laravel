<?php 

class AppController extends Controller{
	public function login(){
		$data=array(
			'title' => 'Login',
		);
		return View::make('appanel/login', $data);
	}

	public function entrar(){
		$username = Input::get('username');
		$password = Input::get('password');
		$_token = Input::get('_token');

		if(Auth::attempt(array('username' => $username, 'password' => $password))){
			return Redirect::to('appanel/index');
			echo 'login exitoso';
			echo Auth::id();
		}else{
			echo 'Error de login';
		}
	}

	public function salir(){
		Auth::logout();
		return Redirect::to('appanel');
	}

	public function index(){
		$data = array(
			'title' => 'Titulo',
		);
		if(Auth::check()){
			return View::make('appanel/index', $data);
		}else{
			return Redirect::to('appanel');
		}
	}
}