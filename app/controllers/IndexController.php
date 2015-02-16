<?php
class IndexController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Index Controller
	|--------------------------------------------------------------------------
	|
	*/

	public function index(){
		//$videos = Cache::remember('videos', 60, function(){
			$videos = Video::lasts()->take(6)->get();
		//});
		//$notas = Cache::remember('notas', 60, function(){
			$notas = Nota::lasts()->take(3)->get();
		//});
		//$videos = Cache::remember('videos', 60, function(){
			$videos_nav = Video::nav()->get();
		//});
		//$notas = Cache::remember('notas', 60, function(){
			$notas_nav = Nota::nav()->get();
		//});
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
		//$videos = Cache::remember('videos', 60, function(){
			$videos = DB::table('videos')
				->select(DB::raw('derbez_videos.uid as vuid, subtitle, name, title, url'))
				->join('categories', 'categories.uid', '=', 'videos.category')
				->join('pictures', 'pictures.uid', '=', 'videos.pic')
				->where('videos.status', '=', 'active')
				->orderBy('videos.id', 'desc')
				->take(12)
				->get();
		//});
		//$videos = Cache::remember('videos', 60, function(){
			$videos_nav = Video::nav()->get();
		//});
		//$notas = Cache::remember('notas', 60, function(){
			$notas_nav = Nota::nav()->get();
		//});
		$categories = Category::where('objects', '=', 'video')->where('status', '=', 'active')->get();
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
		//$videos = Cache::remember('videos', 60, function(){
			$videos = DB::table('videos')
				->select(DB::raw('derbez_videos.uid as vuid, subtitle, name, title'))
				->join('categories', 'categories.uid', '=', 'videos.category')
				->take(12)
				->get();
		//});
		//$notas = Cache::remember('notas', 60, function(){
			$notas = DB::table('notas')
				->take(3)
				->get();
		//});
		//$videos = Cache::remember('videos', 60, function(){
			$videos_nav = Video::nav()->get();
		//});
		//$notas = Cache::remember('notas', 60, function(){
			$notas_nav = Nota::nav()->get();
		//});
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
		//$videos = Cache::remember('videos', 60, function(){
			$videos = DB::table('videos')
				->select(DB::raw('derbez_videos.uid as vuid, subtitle, name, title'))
				->join('categories', 'categories.uid', '=', 'videos.category')
				->take(12)
				->get();
		//});
		//$notas = Cache::remember('notas', 60, function(){
			$notas = DB::table('notas')
				->take(3)
				->get();
		//});
		//$videos = Cache::remember('videos', 60, function(){
			$videos_nav = Video::nav()->get();
		//});
		//$notas = Cache::remember('notas', 60, function(){
			$notas_nav = Nota::nav()->get();
		//});
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
		//$videos = Cache::remember('videos', 60, function(){
			$videos_nav = Video::nav()->get();
		//});
		//$notas = Cache::remember('notas', 60, function(){
			$notas_nav = Nota::nav()->get();
		//});
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

	public function nota($uid){
		$articulo = DB::table('notas')
			->where('uid', '=', $uid)
			->get();

		$picture = DB::table('pictures')
			->where('uid', '=', $articulo[0]->cover)
			->get();

		//$notas = Cache::remember('notas', 60, function(){
			$notas = DB::table('notas')
				->select(DB::raw('derbez_notas.uid as vuid, description, name, title, url, content'))
				->join('categories', 'categories.uid', '=', 'notas.category')
				->join('pictures', 'pictures.uid', '=', 'notas.cover')
				->where('notas.status', '=', 'active')
				->orderBy('notas.id', 'desc')
				->take(3)
				->get();
		//});
		//$videos = Cache::remember('videos', 60, function(){
			$videos_nav = Video::nav()->get();
		//});
		//$notas = Cache::remember('notas', 60, function(){
			$notas_nav = Nota::nav()->get();
		//});
		$data = array(
			'title' => 'Eugenio Derbez',
			'articulo' => $articulo,
			'picture' => $picture,
			'notas' => $notas,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/nota', $data);
	}

	public function preguntame(){
		//$notas = Cache::remember('notas', 60, function(){
			$notas = DB::table('notas')
				->select(DB::raw('derbez_notas.uid as vuid, description, name, title, url, content'))
				->join('categories', 'categories.uid', '=', 'notas.category')
				->join('pictures', 'pictures.uid', '=', 'notas.cover')
				->where('notas.status', '=', 'active')
				->orderBy('notas.id', 'desc')
				->paginate(12);
		//});
		//$videos = Cache::remember('videos', 60, function(){
			$videos_nav = Video::nav()->get();
		//});
		//$notas = Cache::remember('notas', 60, function(){
			$notas_nav = Nota::nav()->get();
		//});
		$data = array(
			'title' => 'Eugenio Derbez',
			'notas' => $notas,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/preguntame', $data);
	}

	public function video($uid){
		//$videos = Cache::remember('videos', 60, function(){
			$videos = DB::table('videos')
				->select(DB::raw('derbez_videos.uid as vuid, subtitle, name, title, url'))
				->join('categories', 'categories.uid', '=', 'videos.category')
				->join('pictures', 'pictures.uid', '=', 'videos.pic')
				->where('videos.status', '=', 'active')
				->orderBy('videos.id', 'desc')
				->take(6)
				->get();
		//});

		$video = DB::table('videos')->where('uid', '=', $uid)->get();
		$category = DB::table('categories')
			->where('uid', '=', $video[0]->category)
			->get();

		//$videos = Cache::remember('videos', 60, function(){
			$videos_nav = Video::nav()->get();
		//});
		//$notas = Cache::remember('notas', 60, function(){
			$notas_nav = Nota::nav()->get();
		//});
		$data = array(
			'title' => 'Eugenio Derbez',
			'video' => $video,
			'category' => $category,
			'videos' => $videos,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/video', $data);
	}

	public function categoryVideos($uid){
		//$videos = Cache::remember('videos', 60, function(){
			$videos = DB::table('videos')
				->select(DB::raw('derbez_videos.uid as vuid, subtitle, name, title, url'))
				->join('categories', 'categories.uid', '=', 'videos.category')
				->join('pictures', 'pictures.uid', '=', 'videos.pic')
				->where('videos.status', '=', 'active')
				->where('videos.category', '=', $uid)
				->orderBy('videos.id', 'desc')
				->take(6)
				->get();
		//});

		$category = DB::table('categories')
			->where('uid', '=', $uid)
			->get();

		//$videos = Cache::remember('videos', 60, function(){
			$videos_nav = Video::nav()->get();
		//});
		//$notas = Cache::remember('notas', 60, function(){
			$notas_nav = Nota::nav()->get();
		//});
		$categories = Category::where('objects', '=', 'video')->where('status', '=', 'active')->get();
		$data = array(
			'title' => 'Eugenio Derbez',
			'category' => $category,
			'categories' => $categories,
			'videos' => $videos,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/videos', $data);
	}
}
