<?php

class DashboardController extends BaseController {

	public function Home()
	{
		return View::make('home');
	}

}