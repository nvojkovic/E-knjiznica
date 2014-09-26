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
}
