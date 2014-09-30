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

	public function History()
	{
		return View::make('bookHistory');
	}

	public function HistoryPost()
	{
		$book = Book::find(Input::get('book'));
		$history2 = $book->borrowAll;
		$history = array();
		foreach ($history2 as $item) {
			$temp = array();
			$user = $item->user;
			$temp['Ime'] = $user->Ime;
			$temp['Prezime'] = $user->Prezime;
			$temp['UserID'] = $user->UserID;
			$temp['DatumPosudbe'] = date('d.m.Y', strtotime($item->DatumPosudbe));
			if(strtotime($item->DatumVracanja) == 0)
				$temp['DatumVracanja'] = "";
			else
				$temp['DatumVracanja'] = date('d.m.Y', strtotime($item->DatumVracanja));
			array_push($history, $temp);
		}
		return View::make('bookHistory', array('history' => $history));
	}
}
