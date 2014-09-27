<?php

class BookController extends BaseController {

	public function Add()
	{
		return View::Make('addBook');
	}

	public function AddPost()
	{
		for($i = 0; $i < Input::get('Primjerci'); $i++)
		{
			Book::Insert(Input::except('Primjerci'));
		}	
		return View::Make('addBook', array('message' => 'Knjiga uspješno dodana! :)'));
	}

	public function Borrow()
	{
		return View::Make('borrow');
	}

	public function BorrowPost()
	{
		$user =User::find(Input::get('user'));
		$book =Book::find(Input::get('book'));

		$borrow = new Borrow;
		$borrow->Korisnik = Input::get('user');
		$borrow->Knjiga = Input::get('book');
		$borrow->DatumPosudbe = date("Y-m-d h:i:s");
		$borrow->save();

		return View::Make('borrow', array('user' => $user->Ime." ".$user->Prezime, 'book' => $book->Naslov));
	}


}
