<?php

class Book extends Eloquent{
	
	public $timestamps = false;
	protected $table = 'knjige';
	protected $fillable = array('*');
}
