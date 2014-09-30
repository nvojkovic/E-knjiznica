<?php

class Borrow extends Eloquent{

	public $timestamps = false;	
	protected $primaryKey = 'BorrowID';
	protected $table = 'posudbe';
	protected $guarded = array();

	public function book()
	{
		return $this->belongsTo('Book', 'BookID', 'Knjiga');
	}
}
