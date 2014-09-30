<?php

class User extends Eloquent{

	public $timestamps = false;	
	protected $primaryKey = 'UserID';
	protected $table = 'korisnici';
	protected $guarded = array();

	public function grade()
	{
		return $this->belongsTo('Grade', 'Razred', 'UserID');
	}
}
