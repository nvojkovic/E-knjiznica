<?php

class StatisticsController extends BaseController {

	public function BookHistory()
	{
		return View::make('bookHistory');
	}

	public function BookHistoryPost()
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
		return View::make('bookHistory', array('history' => $history, 'book' => $book));
	}

	public function BookSearch()
	{
		return View::make('bookSearch');
	}

	public function BookSearchPost()
	{
		if(Input::get('Naslov') != "")
			$books = Book::where('Naslov', 'LIKE', "%".Input::get('Naslov')."%")->leftJoin('posudbe', 'Knjiga' , '=', 'BookID')->leftJoin('korisnici', 'UserID' , '=', 'Korisnik')->groupBy('knjige.BookID')->get();
		else if (Input::get('Autor') != "")
			$books = Book::where('Autor', 'LIKE', "%".Input::get('Autor')."%")->leftJoin('posudbe', 'Knjiga' , '=', 'BookID')->leftJoin('korisnici', 'UserID' , '=', 'Korisnik')->groupBy('knjige.BookID')->get();
		
		return View::make('bookSearch', array('books' => $books));
	}

	public function Borrows()
	{
		$books = Book::join('posudbe', 'Knjiga' , '=', 'BookID')->where('DatumVracanja', '=', NULL)->where('korisnici.Tip', '=', NULL)->Join('korisnici', 'UserID' , '=', 'Korisnik')->get();
		return View::make('bookBorrows', array('books' => $books));
	}
}
