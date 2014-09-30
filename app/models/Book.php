<?php

class Book extends Eloquent{
	
	use SoftDeletingTrait;
	public $timestamps = false;
	protected $primaryKey = 'BookID';
	protected $table = 'knjige';
	protected $fillable = array('*');

	public function borrow()
	{
		return $this->hasOne('Borrow', 'Knjiga', 'BookID')->where('DatumVracanja', NULL);
	}
}
