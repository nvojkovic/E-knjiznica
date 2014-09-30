<?php

class Grade extends Eloquent{
	
	public $timestamps = false;
	protected $primaryKey = 'GradeID';
	protected $table = 'razredi';
	protected $fillable = array('*');

	public function users()
	{
		return $this->hasMany('User', 'Razred');
	}
}
