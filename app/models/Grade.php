<?php

class Grade extends Eloquent{
	
	public $timestamps = false;
	protected $table = 'razredi';
	protected $fillable = array('*');

	public function users()
	{
		return $this->hasMany('User', 'Razred', 'Ucenik');
	}
}
