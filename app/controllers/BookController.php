<?php

class BookController extends BaseController {

	public function Add()
	{
		return View::Make('addBook');
	}

	public function AddPost()
	{
		Book::Create(Input::except('Primjerci'));
		return View::Make('addBook', array('message' => 'Knjiga uspješno dodana! :)'));
	}
}
