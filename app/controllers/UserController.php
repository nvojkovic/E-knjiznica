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
}
