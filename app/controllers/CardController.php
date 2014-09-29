<?php

class CardController extends BaseController {

	public function Create()
	{
		$users = User::all();
		return View::make('printCards', array('users' => $users));
	}

	public function CreatePost()
	{
		header('content-type: application/pdf');

		//size of cards (in cm)
		$sizex = 9.5;
		$sizey = 5.38;

		//create pdf, set landscape, paper size, margins, font
		$pdf = new FPDF('L','cm','A4');
		$pdf->SetMargins(0,0,0);
		$pdf->SetFont('Arial','B',16);
		
		//i is offset for beggining (KINDA BUG: i-1)
		$i = Input::get('place')-1;
		//ids are all users whose cards we are printing
		$ids = Input::get('unos');

		if($i != 0)
		{
			$pdf->AddPage();
		}

		foreach ($ids as $id)
		{
			$user = User::find($id);

			//generate barcode
			$barcodeName = substr(DNS1D::getBarcodePNGPath("U".$id, "C128",5.75,85),2);
			$barcode = imagecreatefrompng($barcodeName);
			$barcode_width = imagesx($barcode);  
			$barcode_height = imagesy($barcode);

			//load template image
			$image = imagecreatefromjpeg('iskaznica.jpg');
			
			//define colors
			$white = ImageColorAllocate($image, 255,255,255);
			$black = ImageColorAllocate($image, 0,0,0);

			//write barcode to image
			$size = getimagesize($barcodeName);
			$dest_x = 50;  
			$dest_y = 400;
			imagefilledrectangle($image, 35, 385, 65+$size[0], 440+$size[1], $white);
			imagecopymerge($image, $barcode, $dest_x, $dest_y, 0, 0, $barcode_width, $barcode_height, 100);

			//write text to image
			putenv('GDFONTPATH=' . realpath('.'));
			$font = "comic-sans.ttf";
			$text = $user->Ime." ".$user->Prezime;
			ImageTTFText($image,57,0,30,316, $black,$font, $text);
			ImageTTFText($image,20,0,210,517, $black,$font,'U'.$id);

			//destroy stuff
			imagejpeg($image, 'U'.$id.".jpg");
			imagedestroy($image);  
			imagedestroy($barcode);

			//1. row
			if($i % 9 == 0)
			{
				$pdf->AddPage();
				$pdf->Image('U'.$id.".jpg", 0.5, 0.5, $sizex,$sizey);
			}
			if($i % 9 == 1)
				$pdf->Image('U'.$id.".jpg", 10.2, 0.5, $sizex,$sizey);
			if($i % 9 == 2)
				$pdf->Image('U'.$id.".jpg", 19.9, 0.5, $sizex,$sizey);

				//2. row
			if($i % 9 == 3)
				$pdf->Image('U'.$id.".jpg", 0.5, 6.5, $sizex,$sizey);
			if($i % 9 == 4)
				$pdf->Image('U'.$id.".jpg", 10.2, 6.5, $sizex,$sizey);
			if($i % 9 == 5)
				$pdf->Image('U'.$id.".jpg", 19.9, 6.5, $sizex,$sizey);

				//3. row
			if($i % 9 == 6)
				$pdf->Image('U'.$id.".jpg", 0.5, 12.5, $sizex,$sizey);
			if($i % 9 == 7)
				$pdf->Image('U'.$id.".jpg", 10.2, 12.5, $sizex,$sizey);
			if($i % 9 == 8)
				$pdf->Image('U'.$id.".jpg", 19.9, 12.5, $sizex,$sizey);

			$i++;

			unlink('U'.$id.".jpg");
			unlink('u'.$id.".png");
		}

		$pdf->Output();

	}
}