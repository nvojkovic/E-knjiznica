<?php

class AV extends Eloquent{
	
	public $timestamps = false;
	protected $primaryKey = 'AVID';
	protected $table = 'AV';
	protected $fillable = array('*');
}
