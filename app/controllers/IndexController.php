<?php
class IndexController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Index Controller
	|--------------------------------------------------------------------------
	|
	*/

	public function index(){
		$videos = Video::lasts()->take(6)->get();
		$notas = Nota::lasts()->take(3)->get();
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();
		$data = array(
			'title' => 'Eugenio Derbez',
			'videos' => $videos,
			'videos_nav' => $videos_nav,
			'notas' => $notas,
			'notas_nav' => $notas_nav,
			'banner' => true
		);
		return View::make('pages/home', $data);
	}

	public function carnales(){
		$videos = Video::orderBy('id', 'desc')->take(12)->get();
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();
		$categories = Category::categoryType('video')->get();
		$data = array(
			'title' => 'Eugenio Derbez',
			'videos' => $videos,
			'categories' => $categories,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/carnales', $data);
	}

	public function derbez(){
		$data = array(
			'title' => 'Eugenio Derbez',
		);
		return View::make('pages/derbez', $data);
	}

	public function legales(){
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();
		$data = array(
			'title' => 'Eugenio Derbez',
			'videos' => $videos,
			'notas' => $notas,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/legales', $data);
	}

	public function meme($uid){
			$videos = DB::table('videos')
				->select(DB::raw('derbez_videos.uid as vuid, subtitle, name, title'))
				->join('categories', 'categories.uid', '=', 'videos.category')
				->take(12)
				->get();

			$notas = DB::table('notas')->take(3)->get();
			$videos_nav = Video::nav()->get();

			$notas_nav = Nota::nav()->get();

		$data = array(
			'title' => 'Eugenio Derbez',
			'videos' => $videos,
			'notas' => $notas,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/meme', $data);
	}

	public function memeteca(){
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();
		$memes = DB::table('memes')
			->select(DB::raw('derbez_memes.uid as muid, url'))
			->join('pics', 'pics.uid', '=', 'memes.pic')
			->orderBy('memes.id', 'desc')
			->get();
		$data = array(
			'title' => 'Eugenio Derbez',
			'memes' => $memes,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/memeteca', $data);
	}

	public function nota($id){
		$nota = Nota::find($id);

		$lasts = Nota::lasts()->take(3)->get();
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();
		$data = array(
			'title' => 'Eugenio Derbez',
			'nota' => $nota,
			'lasts' => $lasts,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/nota', $data);
	}

	public function preguntame(){
		$notas = Nota::orderBy('id', 'desc')->paginate(12);
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();
		$data = array(
			'title' => 'Eugenio Derbez',
			'notas' => $notas,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/preguntame', $data);
	}

	public function video($id){
		$videos = Video::orderBy('id', 'desc')->take(3)->get();

		$video = Video::find($id);
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();
		$data = array(
			'title' => 'Eugenio Derbez',
			'video' => $video,
			'videos' => $videos,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/video', $data);
	}

	public function categoryVideos($id){
		$videos = Category::find($id)->videos()->paginate(12);
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();
		$categories = Category::where('objects', '=', 'video')->where('status', '=', 'active')->get();

		$data = array(
			'title' => 'Eugenio Derbez',
			'categories' => $categories,
			'videos' => $videos,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/videos', $data);
	}
}
