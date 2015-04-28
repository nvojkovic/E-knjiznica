<?php

class UserController extends BaseController {

	public function Add()
	{
		$grades = Grade::all();
		return View::Make('addUser', array('grades' => $grades));
	}

	public function AddPost()
	{
		User::Insert(Input::All());
		$grades = Grade::all();
		return View::Make('addUser', array('message' => 'Korisnik uspješno dodan! :)', 'grades' => $grades));
	}

	public function History()
	{
		return View::Make('userHistory');
	}

	public function HistoryPost()
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

	public function Search()
	{
		$users = User::all();
		return View::Make('userSearch', array('users' => $users));
	}

	public function Show($id)
	{
		$user = User::find($id);
		$borrows = Borrow::where('Korisnik', '=', $id)->leftJoin('knjige', 'BookID' , '=', 'Knjiga')->orderBy('DatumPosudbe', 'DESC')->get();
		//return array('user' => $user, 'borrows' => $borrows);
		return View::Make('userShow', array('user' => $user, 'borrows' => $borrows));
	}
}
