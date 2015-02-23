<?php

class Add extends Eloquent{

	public function cliente(){
		return $this->belongsTo('Client');
	}

	public function posicion(){
		return $this->belongsTo('Position');
	}

}