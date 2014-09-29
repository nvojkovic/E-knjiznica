<?php

class ContactController extends BaseController {

	public function Show()
	{
		//get messages
		$old = file_get_contents("http://vojka.tk/chat/content");
		//split by $ sign (individual messages)
		$old_explode = explode("$", $old);
		$messages = array();
		foreach ($old_explode as $message)
		{
			$temp = explode(':', $message);
			array_push($messages, array('type' => $temp[0], 'text' => $temp[1]));
		}
		return View::Make('contact', array('messages' => $messages));
	}

	public function Send()
	{
		//get old messages
		$newMessage = Input::get('message');
		$messages = file_get_contents("http://vojka.tk/chat/content");
		$messages = $messages."$"."K:".$newMessage;

		$messages = htmlentities($messages);

		//upload the message
		file_get_contents("http://vojka.tk/chat/save.php?data=".$messages);

		return Redirect::to('/kontakt');	
	}
}
