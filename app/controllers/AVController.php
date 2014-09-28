<?php

class AVController extends BaseController {

	public function Add()
	{
		return View::Make('addAV');
	}

	public function AddPost()
	{
		for($i = 0; $i < Input::get('Primjerci'); $i++)
		{
			AV::Insert(Input::except('Primjerci'));
		}	
		return View::Make('addAV', array('message' => 'AV građa uspješno dodana! :)'));
	}

}
