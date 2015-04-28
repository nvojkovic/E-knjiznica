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

	public function Borrows()
	{
		$books = Book::join('posudbe', 'Knjiga' , '=', 'BookID')->where('DatumVracanja', '=', NULL)->where('korisnici.Tip', '=', NULL)->Join('korisnici', 'UserID' , '=', 'Korisnik')->get();
		return View::make('bookBorrows', array('books' => $books));
	}

	public function UserHistory()
	{
		return View::Make('userHistory');
	}

	public function UserHistoryPost()
	{
		$user = User::find(Input::get('user'));
		$grade = $user->grade;
		$history2 = $user->borrow;
		$history = array();
		foreach($history2 as $item)
		{
			$temp = array();
			$book = $item->book;
			$temp['Naslov'] = $book->Naslov;
			$temp['Autor'] = $book->Autor;
			$temp['BookID'] = $book->BookID;
			$temp['DatumPosudbe'] = date('d.m.Y', strtotime($item->DatumPosudbe));
			if(strtotime($item->DatumVracanja) == 0)
				$temp['DatumVracanja'] = "";
			else
				$temp['DatumVracanja'] = date('d.m.Y', strtotime($item->DatumVracanja));
			array_push($history, $temp);
		}
		return View::Make('userHistory', array('user' => $user, 'grade' => $grade, 'history' => $history));
	}

	public function BooksByYear()
	{
		$types= Book::distinct()->select("Nabava")->groupBy("Nabava")->get();
		return View::make('booksByYear', array('types' => $types));
	}

	public function BooksByYearPost()
	{
		$books = Book::where("Kupljeno", "LIKE", Input::get("godina")."%")->where("Nabava", "=", Input::get("tip"))->get();
		return View::make('booksByYear', array('books' => $books));
	}
}
