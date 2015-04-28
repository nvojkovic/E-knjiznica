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
