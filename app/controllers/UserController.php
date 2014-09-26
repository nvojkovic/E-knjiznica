<?php

class UserController extends BaseController {

	public function Add()
	{
		return View::Make('addUser');
	}

	public function AddPost()
	{
		User::Insert(Input::All());
		return View::Make('addUser', array('message' => 'Korisnik uspješno dodan! :)'));
	}
}
