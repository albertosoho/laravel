<?php

class Client extends Eloquent{

	public function add(){
		return $this->hasOne('Add');
	}

}