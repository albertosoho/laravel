<?php

class Image extends Eloquent{
	protected $table = 'pictures';

	public function nota()
	{
		return $this->belongsTo('Nota', 'cover', 'id');
	}

	public function video()
	{
		return $this->belongsTo('Video', 'pic', 'id');
	}

	public function meme()
	{
		return $this->belongsTo('Meme', 'pic', 'id');
	}
}
