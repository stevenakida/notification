<?php

class Service extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['name'];

    public function clients() {

        return $this->belongsToMany('Client')->withPivot('expires_at', 'created_at');
    }
}