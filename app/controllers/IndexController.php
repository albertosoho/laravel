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
		$videos = Video::orderBy('id', 'desc')->paginate(12);
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();
		$categories = Category::categoryType('video')->get();

		$destacadas = Configurando::where('tipe', '=', 'video_destacados')->first();
		$data = (array) json_decode($destacadas->data);
		foreach($data['destacados'] as $d => $v){
			$array[] = $v;
		}
		$ids = implode(',', $array);
		$slider = Video::whereIn('id', $array)->orderByRaw(DB::raw("FIELD(id, $ids)"))->get();

		$populares = Video::orderBy('views', 'desc')->take(3)->get();

		$data = array(
			'title' => 'Eugenio Derbez',
			'videos' => $videos,
			'categories' => $categories,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav,
			'slider' => $slider,
			'populares' => $populares
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
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/legales', $data);
	}

	public function meme($id){
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();

		$meme = Meme::find($id);

		$meme->views = $meme->views + 1;
		$meme->save();

		$data = array(
			'title' => 'Eugenio Derbez',
			'meme' => $meme,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/meme', $data);
	}

	public function memeteca(){
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();
		$memes = Meme::where('status', '=', 1)->orWhere('status', '=', 2)->take(12)->orderBy('id', 'desc')->get();
		$data = array(
			'title' => 'Eugenio Derbez',
			'memes' => $memes,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/memeteca', $data);
	}

	public function memetecaPages(){
		$memes = Meme::where('status', '=', 1)->orWhere('status', '=', 2)->paginate(12);
		$data = array(
			'memes' => $memes,
		);
		return View::make('pages/memetecaPages', $data);
	}

	public function nota($id){
		$nota = Nota::find($id);
		$lasts = Nota::lasts()->take(2)->get();
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();

		$prev = Nota::where('id', '<', $nota->id)->where('status', '=', 1)->get();
		$next = Nota::where('id', '>', $nota->id)->where('status', '=', 1)->get();

		$nota->views = $nota->views + 1;
		$nota->save();
		$data = array(
			'title' => 'Eugenio Derbez',
			'nota' => $nota,
			'lasts' => $lasts,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav,
			'next' => $next,
			'prev' => $prev
		);
		return View::make('pages/nota', $data);
	}

	public function preguntame(){
		$notas = Nota::orderBy('id', 'desc')->paginate(10);
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();

		$destacadas = Configurando::where('tipe', '=', 'nota_destacados')->first();
		$data = (array) json_decode($destacadas->data);
		foreach($data['destacados'] as $d => $v){
			$array[] = $v;
		}
		$ids = implode(',', $array);
		$slider = Nota::whereIn('id', $array)->orderByRaw(DB::raw("FIELD(id, $ids)"))->get();

		$data = array(
			'title' => 'Eugenio Derbez',
			'notas' => $notas,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav,
			'slider' => $slider,
		);
		return View::make('pages/preguntame', $data);
	}

	public function video($id){
		$videos = Video::orderBy('id', 'desc')->take(3)->get();

		$video = Video::find($id);
		$videos_nav = Video::nav()->get();
		$notas_nav = Nota::nav()->get();

		$video->views = $video->views + 1;
		$video->save();

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

	/*
	|--------------------------------------------------------------------------
	| Sanitizing functions
	|--------------------------------------------------------------------------
	|
	*/

	public function sanitize($text, $length){
		$text = strip_tags($text);
		if(strlen($text) > $length) {
			$text = substr($text, 0, strpos($text, ' ', $length));
		}

		return $text;
	}

}
