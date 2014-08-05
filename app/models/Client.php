<?php

class Client extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

    public function services(){
        return $this->belongsToMany('Service')->withPivot('expires_at', 'created_at');
    }
}