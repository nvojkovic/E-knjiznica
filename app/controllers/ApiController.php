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

}
