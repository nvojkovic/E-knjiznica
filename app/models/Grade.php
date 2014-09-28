<?php

class Grade extends Eloquent{
	
	public $timestamps = false;
	protected $table = 'razred';
	protected $fillable = array('*');

	public function users()
	{
		return $this->hasMany('User', 'Razred', 'Ucenik');
	}
}
