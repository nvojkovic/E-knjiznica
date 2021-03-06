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
		$borrow->DatumVracanja = NULL;
		$borrow->save();

		return View::Make('borrow', array('user' => $user->Ime." ".$user->Prezime, 'book' => $book->Naslov));
	}

	public function Returning()
	{
		return View::Make('returning');
	}

	public function ReturningPost()
	{
		$book = Book::find(Input::get('book'));

		if(!count($book->borrow()))
		{
			return View::Make('returning');
		}

		//return the book
		$borrow = $book->borrow;
		$borrow->DatumVracanja = date("Y-m-d h:i:s");
		$borrow->save();

		//print the confirmation
		$book = Book::find(Input::get('book'));
		$user = User::find($borrow->Korisnik);
		$book = $book->Naslov;
		$user = $user->Ime." ".$user->Prezime;
		return View::Make('returning',array('book' => $book, 'user' => $user));
	}

	public function WriteOff()
	{
		return View::make('writeBookOff');
	}

	public function WriteOffPost()
	{
		$book = Book::find(Input::get('book'));
		$book->delete();
		return View::Make('writeBookOff',array('book' => $book));
	}

	public function Search()
	{
		return View::make('bookSearch');
	}

	public function SearchPost()
	{
		if(Input::get('Naslov') != "")
			$books = Book::where('Naslov', 'LIKE', "%".Input::get('Naslov')."%")->leftJoin('posudbe', 'Knjiga' , '=', 'BookID')->leftJoin('korisnici', 'UserID' , '=', 'Korisnik')->groupBy('knjige.BookID')->get();
		else if (Input::get('Autor') != "")
			$books = Book::where('Autor', 'LIKE', "%".Input::get('Autor')."%")->leftJoin('posudbe', 'Knjiga' , '=', 'BookID')->leftJoin('korisnici', 'UserID' , '=', 'Korisnik')->groupBy('knjige.BookID')->get();
		
		return View::make('bookSearch', array('books' => $books));
	}

}
