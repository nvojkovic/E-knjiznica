<?php

class Borrow extends Eloquent{

	public $timestamps = false;	
	protected $table = 'posudbe';
	protected $fillable = array('*');
}
