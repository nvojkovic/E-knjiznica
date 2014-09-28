<?php

class User extends Eloquent{

	public $timestamps = false;	
	protected $table = 'korisnici';
	protected $fillable = array('*');

	public function grade()
	{
		return $this->belongsTo('Grade', 'Ucenik', 'Razred');
	}
}
