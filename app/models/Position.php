<?php

class Video extends Eloquent{

	public function add(){
		return $this->hasOne('Add');
	}
}