<?php 

class Nota extends Eloquent {

	public function categoria(){
		return $this->belongsTo('Category', 'category', 'id');
	}

	public function user(){
		return $this->belongsTo('User', 'author', 'id');
	}

	public function scopeNav($query){
		return $query->take(4);
	}

	public function scopeLasts($query){
		return $query->orderBy('id', 'desc');
	}
}