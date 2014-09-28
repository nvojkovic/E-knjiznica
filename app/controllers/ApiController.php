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
		$user = DB::select(DB::raw("SELECT korisnici.Ime, korisnici.Prezime, razredi.Broj, razredi.Slovo FROM korisnici, razredi WHERE CONCAT_WS(' ', Ime, Prezime) LIKE '".$partialName."%'"));
		return $user;
	}

}
