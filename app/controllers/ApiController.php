<?php

class ApiController extends BaseController {

	public function Book($id)
	{
		$book = Book::find($id);
		return $book;	
	}
	public function User($id)
	{
		$user = User::find($id);
		return $user;
	}

	public function UserLike($partialName)
	{
		$user = DB::select(DB::raw("SELECT Ime, Prezime FROM korisnici WHERE CONCAT_WS(' ', Ime, Prezime) LIKE '".$partialName."%'"));
		return $user;
	}

}
