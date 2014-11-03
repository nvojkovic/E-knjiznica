<?php

class AVPrintController extends BaseController {

	public function Create()
	{
		$av = AV::all()->reverse();
		return View::make('printAVStickers', array('av' => $av));
	}

	public function CreatePost()
	{

		header('content-type: application/pdf');

		//create pdf, set landscape, paper size, margins, font
		$pdf = new FPDF('L','cm','A4');
		$pdf->SetMargins(0,0,0);
		$pdf->SetFont('Arial','B',16);

		//size of sticker (in cm)
		$sizex = 4;
		$sizey = 7;

		//row & column offsets 
		$offsetx = 4.25;
		$offsety = 7;

		//load font
		putenv('GDFONTPATH=' . realpath('.'));
		$font = "comic-sans.ttf";

		//$i is offset for first page (i-1 bug)
		$i = Input::get('place')-1;
		//ids are all users whose cards we are printing
		$ids = Input::get('unos');

		if($i != 0)
		{
			$pdf->AddPage();
		}
		foreach ($ids as $id)
		{
			$av = AV::find($id);

			//load template and define colors
			$image = imagecreatefromjpeg('naljepnica.jpg');
			$black = ImageColorAllocate($image, 0,0,0);
			$white = ImageColorAllocate($image, 255,255,255);

			//generate barcode
			$barcodeName = substr(DNS1D::getBarcodePNGPath("A".$id, "C128",3.75,80),2);
			$barcode = imagecreatefrompng($barcodeName);
			$barcode = imagerotate($barcode, 270, 0);
			imagejpeg($barcode, "temp.jpg");

			$barcode = imagecreatefromjpeg("temp.jpg");
			$barcode_width = imagesx($barcode);  
			$barcode_height = imagesy($barcode);

			//write barcode to image
			$size = getimagesize($barcodeName);
			$dest_x = 135;  
			$dest_y = 90;
			imagecopymerge($image, $barcode, $dest_x, $dest_y, 0, 0, $barcode_width, $barcode_height,100);

			//write data under barcode (for manual input)
			ImageTTFText($image,15,270,115,210, $black,$font, "A".$av->AVID);

			//write data to image
			ImageTTFText($image,40,0,10,75, $black,$font, "AV");
			ImageTTFText($image,40,0,10,150, $black,$font, $av->AVID);
			
			//destroy stuff
			imagejpeg($image, 'A'.$av->AVID.".jpg");
			imagedestroy($image);  
			imagedestroy($barcode);
			
			if($i % 21 == 0)
			{
				$pdf->AddPage();
				$pdf->Image('A'.$av->AVID.".jpg", 0, 0, $sizex,$sizey);	
			}
			if($i % 21 == 1)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + $offsetx, 0, $sizex,$sizey);
			if($i % 21 == 2)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 2*$offsetx, 0, $sizex,$sizey);
			if($i % 21 == 3)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 3*$offsetx, 0, $sizex,$sizey);
			if($i % 21 == 4)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 4*$offsetx, 0, $sizex,$sizey);
			if($i % 21 == 5)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 5*$offsetx, 0, $sizex,$sizey);
			if($i % 21 == 6)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 6*$offsetx, 0, $sizex,$sizey);


			if($i % 21 == 7)
				$pdf->Image('A'.$av->AVID.".jpg", 0, 0 + $offsety, $sizex,$sizey);
			if($i % 21 == 8)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + $offsetx, 0 + $offsety, $sizex,$sizey);
			if($i % 21 == 9)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 2*$offsetx, 0 + $offsety, $sizex,$sizey);
			if($i % 21 == 10)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 3*$offsetx, 0 + $offsety, $sizex,$sizey);
			if($i % 21 == 11)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 4*$offsetx, 0 + $offsety, $sizex,$sizey);
			if($i % 21 == 12)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 5*$offsetx, 0 + $offsety, $sizex,$sizey);
			if($i % 21 == 13)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 6*$offsetx, 0 + $offsety, $sizex,$sizey);
			

			if($i % 21 == 14)
				$pdf->Image('A'.$av->AVID.".jpg", 0, 0 + 2*$offsety, $sizex,$sizey);
			if($i % 21 == 15)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + $offsetx, 0 + 2*$offsety, $sizex,$sizey);
			if($i % 21 == 16)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 2*$offsetx, 0 + 2*$offsety, $sizex,$sizey);
			if($i % 21 == 17)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 3*$offsetx, 0 + 2*$offsety, $sizex,$sizey);
			if($i % 21 == 18)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 4*$offsetx, 0 + 2*$offsety, $sizex,$sizey);
			if($i % 21 == 19)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 5*$offsetx, 0 + 2*$offsety, $sizex,$sizey);
			if($i % 21 == 20)
				$pdf->Image('A'.$av->AVID.".jpg", 0 + 6*$offsetx, 0 + 2*$offsety, $sizex,$sizey);

			unlink('a'.$av->AVID.".png");
			unlink('A'.$av->AVID.".jpg");

			$i++;


		}
		$pdf->Output();
	}
}